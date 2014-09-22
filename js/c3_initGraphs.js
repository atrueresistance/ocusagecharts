function loadGraph(url, yLabel, graphType, format)
{
    if ( format == undefined )
    {
        format = '%Y-%m-%d';
    }

    c3.generate({
        bindto: '#chart',
        size: {
            height: 520
        },
        data: {
            x: 'x',
            mimeType: 'json',
            url: url ,
            type: graphType
        },
        axis: {
            x: {
                type: 'timeseries',
                tick: {
                    format: format
                }
            },
            y: {
                label: yLabel
            }
        }
    });
}

function loadPie(url)
{
    c3.generate({
        bindto: '#chart',
        size: {
            height: 520
        },
        data: {
            mimeType: 'json',
            url: url,
            type: 'pie'
        }
    });
}
$( document ).ready(function() {
    if ($(".defaultChart").length > 0 )
    {
        loadGraph(
            $(".defaultChart").data("url"),
            $(".defaultChart").data("label"),
            $(".defaultChart").data("type"),
            $(".defaultChart").data("format")
        );
    }

    if ($(".defaultBar").length > 0 )
    {
        loadPie(
            $(".defaultBar").data("url")
        );
    }
});