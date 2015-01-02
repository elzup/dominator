
$ ->
  $('[data-sync-point]').each ->
    id = $(@).attr('data-sync-point')
    console.log "sended: " + id
    $.ajax(
      type: "GET"
      url: "./psychopass/sync_point/" + id
      success: (res) ->
        console.log res[0]
        console.log res[0].score
        console.log "[data-sync-point=" + res[0].user_id + "]"
        $("[data-sync-point=" + res[0].user_id + "]").html(res[0].score.toFixed(1))
      error: ->
        console.log 'result post error'
    )
