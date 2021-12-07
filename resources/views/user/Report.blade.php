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
.quiz-chartTip {
            padding: 5px 10px;
            border: 1px solid rgba(0,0,0,.1);
            border-radius: 4px;
            background-color: rgba(255,255,255,.9);
            box-shadow: 3px 3px 10px rgba(0,0,0,.1);
            position: absolute;
            z-index: 50;
            max-width: 250px;
        }

        .quiz-graph {
            padding: 10px; 
            height: 370px;
            width: 100%;
        }

        .quiz-graph .x-labels {
            text-anchor: middle;
        }

        .quiz-graph .y-labels {
            text-anchor: end;
        }

        .quiz-graph .quiz-graph-grid {
            stroke: #ccc;
            stroke-dasharray: 0;
            stroke-width: 1;
        }

        .label-title {
            text-anchor: middle;
            text-transform: uppercase;
            font-size: 12px;
            fill: gray;
        }

        .quiz-graph-dot, .quiz-graph-start-dot{
            fill: rgba(0,112,210,1);
            stroke-width: 2;
            stroke: white;   
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




<br>
	<button id="download-button"type="button" class="btn btn-outline-secondary" style="width: 10%;">Download CSV</button>
<br><br>








<h4> Graph shows you balance after each transfer of cash from your wallet</h4>
	<div class="slds-p-top--medium" style="padding:0.001px">
    <div style="padding:1px">
        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="quiz-graph">
            <defs>
                <pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse">
                    <path d="M 50 0 L 0 0 0 50" fill="none" stroke="#e5e5e5" stroke-width="1"></path>
                </pattern>
            </defs>
            <rect x="50" width="calc(100% - 50px)" height="300px" fill="url(#grid)" stroke="gray"></rect>

            <g class="label-title">
                <text x="-160" y="5" transform="rotate(-90)">Balance</text>
            </g>
            <g class="label-title">
                <text x="50%" y="350">After Transaction T</text>
            </g>   
            <g class="x-labels">
			@foreach($transfers as $transfer)
                <text x="{{$loop->index*100+150}}" y="320">T {{$loop->index+1}}</text>
            @endforeach
            </g>
            <g class="y-labels">
				@foreach($transfers as $transfer)
	                <text x="42" y="{{$loop->index*50+5}}">{{$user->balance - $transfer->amount}}</text>  
				@endforeach
            </g>
            <linearGradient id="grad" x1="0%" y1="0%" x2="0%" y2="100%">
                <stop offset="0%" style="stop-color:rgba(99,224,238,.5);stop-opacity:1"></stop>
                <stop offset="100%" style="stop-color:white;stop-opacity:0"></stop>
            </linearGradient>
            <polyline fill="url(#grad)" stroke="#34becd" stroke-width="0" points="

            "></polyline>

            <!--<polyline fill="none" stroke="#34becd" stroke-width="2" points="
            50,0
            150,100
            250,80
            350,160
            450,100
            550,100
            650,150
            750,200
            "></polyline>	i couldn't do it -->
            <g>

			@foreach($transfers as $transfer)
                <circle class="quiz-graph-dot" cx="{{$loop->index*100+150}}" cy="{{$loop->index*50+5}}" data-value="7.2" r="6"></circle>
			@endforeach
            </g>
        </svg>
    </div>
</div>






















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