$(document).ready(function () {

    var refresh = function (table) {
        $('tbody tr:even', table).removeClass('odd').addClass('even');
        $('tbody tr:odd', table).removeClass('even').addClass('odd');
    };

    var starData = function (selectedStar) {

        $('#starContainer').empty();
        $('#constellationContainer').empty();

        $.post('/webdev/portfoliostars/modules/star.php', {'selectedStar': selectedStar}, function (data) {

            var stellarData = JSON.parse(data);
            var tableContent = "<table>";
            tableContent += "<thead>";
            tableContent += "<tr>";

            tableContent += "<th>Denomination</th>";
            tableContent += "<th>Designation</th>";
            tableContent += "<th>HIP Identifier</th>";
            tableContent += "<th>Light Years</th>";
            tableContent += "<th>Radial Velocity</th>";
            tableContent += "<th>Parallax</th>";
            tableContent += "<th>Apparent Magnitude</th>";
            tableContent += "<th>Absolute Magnitude</th>";
            tableContent += "<th>Absolute Luminosity</th>";
            tableContent += "<th>Solar Diameter</th>";
            tableContent += "<th>Inner Boundary</th>";
            tableContent += "<th>Outer Boundary</th>";
            tableContent += "<th>Gregorian Year</th>";
            tableContent += "<th>Spectral Class</th>";
            tableContent += "<th>Stellar Category</th>";

            tableContent += "</tr>";
            tableContent += "</thead>";

            tableContent += "<tbody>";
            tableContent += '<tr>';

            $.each(stellarData, function (i, stellarParameter) {
                tableContent += '<td>' + stellarParameter + '</td>';
            });

            tableContent += '</tr>';
            tableContent += "</tbody>";
            tableContent += "</table>";

            $('#starContainer').html(tableContent);

            $('table td:nth-child(1)').each(function () {
                $(this).click(function () {
                    starData($(this).text());
                }).addClass('pointer');
            });


            $('table thead th').addClass('header');

            $('table').each(function () {

                var star = $(this);
                refresh(star);

                $('thead th', star).each(function () {

                    var header = $(this);
                    if (header.is('.header')) {
                        header.hover(function () {
                            header.addClass('hover');
                        }, function () {
                            header.removeClass('hover');
                        });
                    }

                });
            });
        });
    };

    var constellationData = function (selectedConstellation) {

        $('#starContainer').empty();
        $('#constellationContainer').empty();

        $.post('/webdev/portfoliostars/modules/constellation.php', {'selectedConstellation': selectedConstellation}, function (data) {

            var stellarData = JSON.parse(data);
            var tableContent = '<table>';
            tableContent += "<thead>";
            tableContent += "<tr>";

            tableContent += "<th>Denomination</th>";
            tableContent += "<th>Designation</th>";
            tableContent += "<th>HIP Identifier</th>";
            tableContent += "<th>Light Years</th>";
            tableContent += "<th>Radial Velocity</th>";
            tableContent += "<th>Parallax</th>";
            tableContent += "<th>Apparent Magnitude</th>";
            tableContent += "<th>Absolute Magnitude</th>";
            tableContent += "<th>Absolute Luminosity</th>";
            tableContent += "<th>Solar Diameter</th>";
            tableContent += "<th>Inner Boundary</th>";
            tableContent += "<th>Outer Boundary</th>";
            tableContent += "<th>Gregorian Year</th>";
            tableContent += "<th>Spectral Class</th>";
            tableContent += "<th>Stellar Category</th>";

            tableContent += "</tr>";
            tableContent += "</thead>";

            tableContent += "<tbody>";

            $.each(stellarData, function (i, stellarRecord) {

                tableContent += '<tr>';

                $.each(stellarRecord, function (j, stellarAttribute) {
                    tableContent += '<td>' + stellarAttribute + '</td>';
                });

                tableContent += '</tr>';

            });
            tableContent += "</tbody>";
            tableContent += "</table>";

            $('#constellationContainer').html(tableContent);

            $('table td:nth-child(1)').each(function () {
                $(this).click(function () {
                    starData($(this).text());
                }).addClass('pointer');
            });

            $('tbody tr:even').removeClass('odd').addClass('even');
            $('tbody tr:odd').removeClass('even').addClass('odd');
            $('table thead th').addClass('header');

            $('table').each(function () {

                var constellation = $(this);
                refresh(constellation);

                $('thead th', constellation).each(function (dataField) {

                    var header = $(this);
                    if (header.is('.header')) {
                        header.addClass('clickable').hover(function () {
                            header.addClass('hover');
                        }, function () {
                            header.removeClass('hover');
                        });

                        header.click(function () {
                            var dataSets = constellation.find('tbody > tr').get();

                            dataSets.sort(function (key_1, key_2) {
                                var keyA = $(key_1).children('td').eq(dataField).text().toUpperCase();
                                var keyB = $(key_2).children('td').eq(dataField).text().toUpperCase();

                                if (keyA < keyB)
                                    return -1;
                                if (keyA > keyB)
                                    return 1;

                                return 0;

                            });

                            $.each(dataSets, function (i, dataSet) {
                                constellation.children('tbody').append(dataSet);
                            });

                            constellation.find('td').removeClass('orderedConstellation');
                            constellation.find('td').filter(':nth-child(' + (dataField + 1) + ')').addClass('orderedConstellation');

                            refresh(constellation);

                        });
                    }

                });
            });
        });
    };

    $('#queryButton').click(function () {

        if ($('#queryConstellation').val().length !== 0 && $('#queryDenomination').val().length === 0) {
            constellationData($('#queryConstellation').val());
            $('#queryConstellation').val(undefined);
        }
        if ($('#queryConstellation').val().length === 0 && $('#queryDenomination').val().length !== 0) {
            starData($('#queryDenomination').val());
            $('#queryDenomination').val(undefined);
        }

    });
});