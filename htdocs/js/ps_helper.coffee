
$ ->
    id = $('[data-sync-point]').each ->
        id = $(@).attr('data-sync-point')
        $.ajax(
            type: "GET",
            url: "./psychopass/sync_point/" + id
            success: (res) ->
                $('[data-sync-point=' + res[0].screen_name + ']').html(res[0].point)
                console.log 'get'
            error: ->
                console.log 'result post error'
        )
