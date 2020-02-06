<?php

namespace Modules\Library\Controllers;

use Modules\Library\Models\Document;
use Modules\Library\Models\History;
use File, Carbon\Carbon;
use System\Core\Controllers\WebController as Controller;

class WebController extends Controller
{
    public static function viewCategory($category)
    {
        $data['catLib'] = $category;
        $data['page_title'] = $category['name'];
        $data['listLib'] = $category->document()->orderBy('id', 'desc')->paginate(10);
        $format_category = $category->format_type;
        if ($format_category == 1) {
            return view('Library::web.category_liblary', $data);
        } else {
            return view('Library::web.category_liblary_media', $data);
        }
    }
    public static function detailDocument($document)
    {

        $data['lib'] = $document;

        $data['page_title'] =   $data['lib']->name;
        $data['cat'] = $document->category()->orderBy('id', 'desc')->first();
        // Document::where('id', $document->id)->update(['view_count' => $document->view_count + 1]);
        $id = $data['lib']->id;
        $module = 'Library';
        if (module_check_active('Comment')) {
            foreach (mod_comment_get_data_comment($id, $module) as $key => $value) {
                $data[$key] = $value;
            }
        }
        $document->fill(['view_count' => $document['view_count'] + 1])->save();
        // $document->fill(['download_count' => $document['download_count'] + 1])->save();
        if ($data['cat']->format_type == 1) {
            return view('Library::web.detail_liblary', $data)->withShortcodes();
        } else {
            return view('Library::web.detail_liblary_media', $data)->withShortcodes();
        }
    }
    public function getDownload($id)
    {
        if (auth('web')->check()) {
            $doc = Document::find($id);
            if ($doc) {
                if ($doc['attach_file'] !== null && File::exists(public_path($doc['attach_file']))) {
                    $doc->increment('download_count');
                    $new_history = History::create([
                        'user_id' =>  auth('web')->id(),
                        'document_id' => $doc['id'],
                        'category_id' => $doc['category_id'],
                        'download_time' => Carbon::now()
                    ]);
                    if ($new_history) {
                        return response()->streamDownload(function () use ($doc) {
                            echo file_get_contents(public_path($doc['attach_file']));
                        }, File::name(public_path($doc['attach_file'])) . '.' . File::extension(public_path($doc['attach_file'])));
                    } else return "Error";
                }
                $html = "Không tìm thấy tài liệu!";
                $html .= '<script type="text/javascript">setTimeout(function(){ window.close(); }, 2000);</script>';
                return $html;
            }
            return "Error";
        }
        return "Error";
    }
}