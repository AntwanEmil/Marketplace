<x-Layout>

  @section('content')
      

  @if(session('fail'))
  <div class="alert alert-danger">{{session('fail')}}</div>

  @elseif(session('success'))
  <div class="alert alert-success">{{session('success')}}</div>

  @endif

<style>
    th{
    background-color: #6495ED;   
    border: 2px solid black;
  width: 25%;
  text-align: left;
  vertical-align: top;   
    }
 td {
    background-color:#E8E8E8;   
	width:0.1%;
	border: 2px	solid white;
   white-space: nowrap;
  text-align: left;
  vertical-align: top;
}
    </style>

<h4> Your description of the latest transactions </h4>

  <table id="table">
	    <tr>
	        <th>Date & Time (latest on top)</th>
	        <th>Description</th>
	    </tr>
@foreach ($reports as $report)
	    <tr>
	        <td>{{$report->date}}</td>
	        <td>{{$report->description}}</td>
	    </tr>
@endforeach	   
	</table>
<br><br>




<br><br><br>
	<button id="download-button"type="button" class="btn btn-outline-secondary" style="width: 10%;">Download CSV</button>

	<script type="text/javascript">

	function downloadCSVFile(csv, filename) {
	    var csv_file, download_link;

	    csv_file = new Blob([csv], {type: "text/csv"});

	    download_link = document.createElement("a");

	    download_link.download = filename;

	    download_link.href = window.URL.createObjectURL(csv_file);

	    download_link.style.display = "none";

	    document.body.appendChild(download_link);

	    download_link.click();
	}

		document.getElementById("download-button").addEventListener("click", function () {
		    var html = document.querySelector("table").outerHTML;
			htmlToCSV(html, "report.csv");
		});


		function htmlToCSV(html, filename) {
			var data = [];
			var rows = document.querySelectorAll("table tr");
					
			for (var i = 0; i < rows.length; i++) {
				var row = [], cols = rows[i].querySelectorAll("td, th");
						
				 for (var j = 0; j < cols.length; j++) {
				        row.push(cols[j].innerText);
		                 }
				        
				data.push(row.join(","));		
			}

			//to remove table heading
			//data.shift()

			downloadCSVFile(data.join("\n"), filename);
		}

	</script>







  @endsection
</x-Layout>