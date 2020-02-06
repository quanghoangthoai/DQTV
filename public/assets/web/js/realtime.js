document.addEventListener('DOMContentLoaded', function () {
  // console.log('123')
  var $dOut = $('#date'),
    $hOut = $('#hours'),
    $mOut = $('#minutes'),
    $sOut = $('#seconds'),
    $ampmOut = $('#ampm');
  var months = [
    'tháng 1', 'tháng 2', 'tháng 3', 'tháng 4', 'tháng 5', 'tháng 6', 'tháng 7', 'tháng 8', 'tháng 9', 'tháng 10', 'tháng 11', 'tháng 12'
  ];
  var days = [
    'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sau', 'Thứ bảy', 'Chủ nhật'
  ];
  function update() {
    var date = new Date();

    var ampm = date.getHours() < 12
      ? 'AM'
      : 'PM';

    var hours = date.getHours() == 0
      ? 12
      : date.getHours() > 12
        ? date.getHours() - 12
        : date.getHours();
    var hours = date.getHours() < 10
      ? '0' + date.getHours()
      : date.getHours();
    var minutes = date.getMinutes() < 10
      ? '0' + date.getMinutes()
      : date.getMinutes();

    var seconds = date.getSeconds() < 10
      ? '0' + date.getSeconds()
      : date.getSeconds();

    var dayOfWeek = days[date.getDay()];
    var month = months[date.getMonth()];
    var day = date.getDate();
    var year = date.getFullYear();

    var dateString = dayOfWeek + ', ngày ' + day + ' ' + month + ' năm ' + year;

    $dOut.text(dateString);
    $hOut.text(hours);
    $mOut.text(minutes);
    $sOut.text(seconds);
    $ampmOut.text(ampm);
  }
  update();
  window.setInterval(update, 1000);

}, false)
