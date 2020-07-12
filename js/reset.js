/*
    功能：打开心得浏览器窗口并居中显示
    参数：
        url:需要打开的url地址
        name:打开的窗口名称，可以为null
        customWidth:窗口的宽度
        customHeight:窗口的高度
*/

function openNewWindow(url, name, customWidth, customHeight) {
  // 设置宽高的默认值
  if (!customWidth) {
    customWidth = window.screen.width / 1.5;
  }
  if (!customHeight) {
    customHeight = window.screen.height / 2;
  }

  //window.screen.height获得屏幕的高，window.screen.width获得屏幕的宽
  var iTop = (window.screen.height - 30 - customHeight) / 2; //获得窗口的垂直位置;
  var iLeft = (window.screen.width - 10 - customWidth) / 2; //获得窗口的水平位置;

  window.open(
    url,
    name,
    "height=" +
      customHeight +
      ",innerHeight=" +
      customHeight +
      ",width=" +
      customWidth +
      ",innerWidth=" +
      customWidth +
      ",top=" +
      iTop +
      ",left=" +
      iLeft +
      ",toolbar=no,menubar=no,scrollbars=auto,resizeable=no,location=no,status=no"
  );
}
