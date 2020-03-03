var Script = function () {

//  tracking chart

    var plot;
    $(function () {
        var sin = [], cos = [];
        for (var i = 0; i < 14; i += 0.1) {
            sin.push([i, Math.sin(i)]);
            cos.push([i, Math.cos(i)]);
        }

        plot = $.plot($("#chart-1"),
            [ { data: sin, label: "sin(x) = -0.00"},
                { data: cos, label: "cos(x) = -0.00" } ], {
                series: {
                    lines: { show: true }
                },
                crosshair: { mode: "x" },
                grid: { hoverable: true, autoHighlight: false },
                yaxis: { min: -1.2, max: 1.2 }
            });
        var legends = $("#chart-1 .legendLabel");
        legends.each(function () {
            // fix the widths so they don't jump around
            $(this).css('width', $(this).width());
        });


    });
}();