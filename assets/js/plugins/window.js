var i = 0,
  minimizedWidth = new Array(),
  minimizedHeight = new Array(),
  windowTopPos = new Array(),
  windowLeftPos = new Array(),
  panel,
  id;

function minimizeAllWindows() {
  $(".window").each(function () {
    var windowId = $(this).attr("data-id");
    minimizeWindow(windowId);
  });
}

function adjustFullScreenSize() {
  $(".fullSizeWindow .wincontent").css("width", window.innerWidth - 32);
  $(".fullSizeWindow .wincontent").css("height", window.innerHeight - 98);
}

function makeWindowActive(thisid) {
  $(".window").each(function () {
    $(this).css("z-index", $(this).css("z-index") - 1);
  });
  $("#window" + thisid).css("z-index", 1000);
  $(".window").removeClass("activeWindow");
  $("#window" + thisid).addClass("activeWindow");

  $(".taskbarPanel").removeClass("activeTab");

  $("#minimPanel" + thisid).addClass("activeTab");
}

function minimizeWindow(id) {
  windowTopPos[id] = $("#window" + id).css("top");
  windowLeftPos[id] = $("#window" + id).css("left");

  $("#window" + id).animate(
    {
      top: 800,
      left: 0,
    },
    200,
    function () {
      $("#window" + id).addClass("minimizedWindow");
      $("#minimPanel" + id).addClass("minimizedTab");
      $("#minimPanel" + id).removeClass("activeTab");
    }
  );
}

function openWindow(id) {
  if ($("#window" + id).hasClass("minimizedWindow")) {
    openMinimized(id);
  } else {
    makeWindowActive(id);
    $("#window" + id).removeClass("closed");
    $("#minimPanel" + id).removeClass("closed");
    var randomLeft = Math.floor(Math.random() * 40);
    var randomTop = Math.floor(Math.random() * 40);

    $("#window" + id).css({
      left: randomLeft + "vw",
      top: randomTop + "vh",
    });
  }
}

function closeWindwow(id) {
  $("#window" + id).addClass("closed");
  $("#minimPanel" + id).addClass("closed");
}

function openMinimized(id) {
  $("#window" + id).removeClass("minimizedWindow");
  $("#minimPanel" + id).removeClass("minimizedTab");
  makeWindowActive(id);

  $("#window" + id).animate(
    {
      top: windowTopPos[id],
      left: windowLeftPos[id],
    },
    200,
    function () {}
  );
}

$(document).ready(function () {
  $(".window").each(function () {
    $(this).css("z-index", 1000);
    $(this).attr("data-id", i);
    minimizedWidth[i] = $(this).width();
    minimizedHeight[i] = $(this).height();
    windowTopPos[i] = $(this).css("top");
    windowLeftPos[i] = $(this).css("left");
    $("#taskbar").append(
      '<div class="taskbarPanel" id="minimPanel' +
        i +
        '" data-id="' +
        i +
        '">' +
        $(this).attr("data-title") +
        "</div>"
    );
    if ($(this).hasClass("closed")) {
      $("#minimPanel" + i).addClass("closed");
    }
    $(this).attr("id", "window" + i++);
    $(this).wrapInner(`<div class="wincontent" style="
	  min-height:${$(this).attr("min-height")};
	  min-width:${$(this).attr("min-width")};
    max-height:${$(this).attr("max-height")};
    max-width:${$(this).attr("max-width")};
    ">
	  </div>`);
    $(this).prepend(`
    <div class="title-bar">
        <div class="title-bar-text">${$(this).attr("data-title")}</div>
        <div class="title-bar-controls">
            <span title="Minimize" class="winminimize">
                <button aria-label="Minimize"></button>
            </span>
            ${
              $(this).attr("togglemax") == "true"
                ? `
                <span title="Maximize" class="winmaximize">
                    <button aria-label="Maximize"></button>
                </span>
            `
                : ""
            }
            <span title="Close" class="winclose">
                <button aria-label="Close"></button>
            </span>
        </div>
    </div>
`);
  });

  $("#minimPanel" + (i - 1)).addClass("activeTab");
  $("#window" + (i - 1)).addClass("activeWindow");

  $(".wincontent").resizable();
  $(".window").draggable({ cancel: ".wincontent" });

  $(".window").mousedown(function () {
    makeWindowActive($(this).attr("data-id"));
  });

  $(".winclose").click(function () {
    closeWindwow($(this).parent().parent().parent().attr("data-id"));
  });

  $(".winminimize").click(function () {
    minimizeWindow($(this).parent().parent().parent().attr("data-id"));
  });

  $(".taskbarPanel").click(function () {
    id = $(this).attr("data-id");
    if ($(this).hasClass("activeTab")) {
      minimizeWindow($(this).attr("data-id"));
    } else {
      if ($(this).hasClass("minimizedTab")) {
        openMinimized(id);
      } else {
        makeWindowActive(id);
      }
    }
  });

  $(".openWindow").click(function () {
    openWindow($(this).attr("data-id"));
  });

  $(".winmaximize").click(function () {
    if ($(this).parent().parent().parent().hasClass("fullSizeWindow")) {
      $(this).parent().parent().parent().removeClass("fullSizeWindow");
      $(this)
        .parent()
        .parent()
        .parent()
        .children(".wincontent")
        .height(
          minimizedHeight[$(this).parent().parent().parent().attr("data-id")]
        );
      $(this)
        .parent()
        .parent()
        .parent()
        .children(".wincontent")
        .width(
          minimizedWidth[$(this).parent().parent().parent().attr("data-id")]
        );
    } else {
      $(this).parent().parent().parent().addClass("fullSizeWindow");

      minimizedHeight[$(this).parent().parent().parent().attr("data-id")] = $(
        this
      )
        .parent()
        .parent()
        .parent()
        .children(".wincontent")
        .height();
      minimizedWidth[$(this).parent().parent().parent().attr("data-id")] = $(
        this
      )
        .parent()
        .parent()
        .parent()
        .children(".wincontent")
        .width();

      adjustFullScreenSize();
    }
  });
  adjustFullScreenSize();
});
