
window.bookmark =function(post_id) {
    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url: `/bookmark/${post_id}`,
      type: "POST",
    })
      .done(function (data, status, xhr) {
        console.log(data);
      })
      .fail(function (xhr, status, error) {
        console.log("Ajaxリクエストが失敗しました。エラー：" + error);
      });
  }

  window.unbookmark =function(post_id) {
    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url: `/unbookmark/${post_id}`,
      type: "POST",
    })
      .done(function (data, status, xhr) {
        console.log(data);
      })
      .fail(function (xhr, status, error) {
        console.log("Ajaxリクエストが失敗しました。エラー：" + error);
      });
  }

  
