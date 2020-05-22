  <!-- Export Multi-Scripts -->
  <script type="text/javascript" src="libs/js-xlsx/xlsx.core.min.js"></script>
  <script type="text/javascript" src="libs/FileSaver/FileSaver.min.js"></script>
  <!--
  <script type="text/javascript" src="../libs/pdfmake/pdfmake.min.js"></script>
  <script type="text/javascript" src="../libs/pdfmake/vfs_fonts.js"></script>
  -->
  <script type="text/javascript" src="libs/jsPDF/jspdf.min.js"></script>
  <script type="text/javascript" src="libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
  <script type="text/javascript" src="libs/html2canvas/html2canvas.min.js"></script>
  <script type="text/javascript" src="libs/tableExport.js"></script>

  <script type="text/javaScript">

    function doExport(selector, params) {
      var options = {
        //ignoreRow: [1,11,12,-2],
        //ignoreColumn: [0,-1],
        //pdfmake: {enabled: true},
        tableName: 'dataTable',
        worksheetName: 'Countries by population'
      };

      $.extend(true, options, params);

      $(selector).tableExport(options);
    }

    function DoOnCellHtmlData(cell, row, col, data) {
      var result = "";
      if (data != "") {
        var html = $.parseHTML( data );

        $.each( html, function() {
          if ( typeof $(this).html() === 'undefined' )
            result += $(this).text();
          else if ( $(this).is("input") )
            result += $('#'+$(this).attr('id')).val();
          else if ( ! $(this).hasClass('no_export') )
            result += $(this).html();
        });
      }
      return result;
    }

    function DoOnMsoNumberFormat(cell, row, col) {
      var result = "";
      if (row > 0 && col == 0)
        result = "\\@";
      return result;
    }

  </script>