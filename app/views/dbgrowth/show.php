<?php
$title = 'Database Growth';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php';

$year = $_SESSION['GrowthYear'];

?>

<div class="flex flex-col">
    <div class="flex justify-between mb-5">
        <h1 class="text-3xl text-black text-white">
            <b>Database Growth</b>
        </h1>
        <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="ml-2 fas fa-redo"></i></button>
    </div>
    <div id="chartArea" class="flex flex-col py-6 px-4 justify-center items-center w-full h-full bg-gray-50 rounded-md">
        <div class="flex h-fit w-full justify-end items-center z-10 gap-2">
            <div class="flex gap-2 text-center text-sm">
                <label class="pt-1">View by :</label>
                <select name="" id="unitChanger" class="hover:bg-gray-100 cursor-pointer appearance-none border-2 border-gray-300 border-solid shadow-inner rounded-md py-1 px-4">
                    <option class="cursor-pointer" selected value="GB">GigaBytes</option>
                    <option class="cursor-pointer" value="MB">MegaBytes</option>
                </select>
            </div>
            <div class="flex gap-2 text-center text-sm">
                <label class="pt-1">from :</label>
                <form action="<?php echo URLROOT; ?>/dbgrowths/show" method="POST">
                    <select id="year-select" name="year" class="hover:bg-gray-100 cursor-pointer appearance-none border-2 border-gray-300 border-solid shadow-inner rounded-md py-1 px-4"></select>
                </form>
            </div>
        </div>
        <div id="dbgrowthchart" class="w-full bg-gray-50 rounded-md mt-2" style="z-index:2;">
        </div>

    </div>
    <div id="chartArea" class="flex flex-col py-6 px-4 my-4 justify-start items-center w-full h-full bg-gray-50 rounded-md">
        <div class="flex justify-end items-start gap-2 text-center text-sm w-full">
			<label class="pt-1">Database :</label>
            <select name="" id="dbSelect" class="hover:bg-gray-100 cursor-pointer appearance-none border-2 border-gray-300 border-solid shadow-inner rounded-md py-1 px-4">
                <?php foreach ($data['Diff'] as $k => $v) { ?>
                    <option class="cursor-pointer" value="<?php echo $k; ?>"><?php echo $v['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <!-- show details for a single database like total size of db, free size and used size per month -->
        <div id="singledbgrowthchart" class="w-full bg-gray-50 rounded-md mt-2" style="z-index:2;">
        </div>
    </div>
</div>

<script>
    const onChangeElement = document.getElementById('year-select');

    onChangeElement.addEventListener('change', function() {
        this.form.submit();
    });


    // Year Dropdown
    // Automatic show all years, from the defined minimum year(2020) to the latest year.
    // Auto select the latest year.
    const getYearsArray = () => {
        const currentYear = new Date().getFullYear();
        const years = [];

        for (let year = 2020, i = 0; year <= currentYear; year++, i++) {
            years[i] = year;
        }

        return years;
    };

    const selectElement = document.querySelector('#year-select');

    for (const year of getYearsArray()) {
        const optionElement = document.createElement('option');
        optionElement.textContent = year;
        optionElement.value = year;
		optionElement.selected = (year === <?php echo $year; ?> ? true : false);
		selectElement.appendChild(optionElement);
    }

    // this is the array where the graph will pull the data from
    const dbGrowthRawData = <?php echo json_encode($data['Growth']); ?>

    /**
     * Converts the database growth size from bytes to MB or GB, depending on the
     * specified unit.
     *
     * @param {number} bytesValue The database size in bytes.
     * @param {string} unit The desired unit of measurement.
     * @returns {number} The database size in the specified unit.
     * 
     * is being called inside convertLoop() function
     */
    function convertBytes (bytesValue, unit) {
        switch(unit) {
			case 'MB':
				return bytesValue / (1024 * 1024);
				break;
			case 'GB':
				return bytesValue / (1024 * 1024 * 1024);
				break;
			default:
				return bytesValue;
        }
    }

    // The currently selected unit for the database size. GB as default
    let unit = 'GB';

    // This array will contain the converted data for the database growth graph.
    const dbGrowthDataConverted = () => {
		
		let result = [], i = 0;
        // Loop through the raw data array
        for (const series of dbGrowthRawData) {
            // Convert the raw data for the current series
            const convertedSeries = {
                name: series.name,
                data: convertArray(series.data),
            };
            // Add the converted series to the converted data array
            result[i] = convertedSeries;
			i++;
        }
		
		return result;
    }

    const optionsDBGROWTH = {
        series: dbGrowthDataConverted(),
        chart: {
            fontFamily: 'Lexend',
            height: 450,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        stroke: {
            width: 5,
            curve: 'smooth',
            dashArray: 0,
            colors: ['#0074D9', '#FF851B', '#2ECC40', '#FF4136', '#B10DC9', '#FFDC00', '#7FDBFF', '#F012BE', '#01FF70', '#85144b', '#AAAAAA', '#000000']

        },
        title: {
            text: 'Overall Monthly Growth',
            align: 'left'
        },
        tooltip: {
            marker: {
                show: true,
                fillColors: ['#0074D9', '#FF851B', '#2ECC40', '#FF4136', '#B10DC9', '#FFDC00', '#7FDBFF', '#F012BE', '#01FF70', '#85144b', '#AAAAAA', '#000000']

            },
        },
        legend: {
            tooltipHoverFormatter: function(val) {
                return val
            },
            markers: {
                fillColors: ['#0074D9', '#FF851B', '#2ECC40', '#FF4136', '#B10DC9', '#FFDC00', '#7FDBFF', '#F012BE', '#01FF70', '#85144b', '#AAAAAA', '#000000'],
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            },
            colors: ['#0074D9', '#FF851B', '#2ECC40', '#FF4136', '#B10DC9', '#FFDC00', '#7FDBFF', '#F012BE', '#01FF70', '#85144b', '#AAAAAA', '#000000']
        },
        xaxis: {
            categories: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        },
        yaxis: [{
            labels: {
                formatter: function(val) {
                    return `${val.toFixed(unit === 'GB' ? 2 : 1)} ${unit}`;
                }
            },
        }],
        grid: {
            show: true,
            borderColor: '#0d0d0d',
        }
    };

    // Create a new ApexCharts instance and render the database growth graph.
    const chartOverallDBGrow = new ApexCharts(document.querySelector("#dbgrowthchart"), optionsDBGROWTH);
    chartOverallDBGrow.render();

    /**
     * Changes the currently selected unit for the database size and then re-renders
     * the graph.
     * Is being called by the select tag when choosing a unitType
     */
        let unitSelected = document.querySelector('#unitChanger');
		unitSelected.addEventListener('change',() => {
		unit = unitSelected.value
			
			chartOverallDBGrow.updateOptions({
				series: dbGrowthDataConverted()
			});
			
			chartsingleDBGrow.updateOptions({
			series: [{
				data: convertArray(rawDBGrowthdiffData[selectDBElement.value].data),
				name: selectedDB
			}],
			title: {
			text: `${selectedDB} Monthly Growth`,
				align: 'left'
			}
			});
			
		})

//-------------------------------------------- For Single DB Growth Column chart ------------------------------------------------------

	const rawDBGrowthdiffData = <?php echo json_encode($data['Diff']); ?>;
    let selectDBElement = document.getElementById('dbSelect');
	let selectedDB = selectDBElement.options[selectDBElement.value].text
	
    selectDBElement.addEventListener('change', () => {
        selectedDB = selectDBElement.options[selectDBElement.value].text
		chartsingleDBGrow.updateOptions({
			series: [{
				data: convertArray(rawDBGrowthdiffData[selectDBElement.value].data),
				name: selectedDB
			}],
			title: {
				text: `${selectedDB} Monthly Growth`,
				align: 'left'
			}
		});
    })
	
	function convertArray(array){
		let result = array.map((value) => {
			return ((value === '0') ? '0' : convertBytes(parseInt(value), unit).toFixed(2))
		})
		
		return result
	}

    const optionssingleDBGROWTH = {
        series: [{
            data: convertArray(rawDBGrowthdiffData[selectDBElement.value].data),
            name: selectedDB
        }],
        chart: {
            fontFamily: 'Lexend',
            height: 450,
            type: 'bar',
            zoom: {
                enabled: false
            },
        },
        stroke: {
            width: 5,
            curve: 'smooth',
            dashArray: 0,
            colors: ['#0074D9', '#FF851B', '#2ECC40', '#FF4136', '#B10DC9', '#FFDC00', '#7FDBFF', '#F012BE', '#01FF70', '#85144b', '#AAAAAA', '#000000']

        },
        title: {
            text: `${selectedDB} Monthly Growth`,
            align: 'left'
        },
        tooltip: {
            marker: {
                show: true,
                fillColors: ['#0074D9', '#FF851B', '#2ECC40', '#FF4136', '#B10DC9', '#FFDC00', '#7FDBFF', '#F012BE', '#01FF70', '#85144b', '#AAAAAA', '#000000']

            },
        },
        legend: {
            tooltipHoverFormatter: function(val) {
                return val
            },
            markers: {
                fillColors: ['#0074D9', '#FF851B', '#2ECC40', '#FF4136', '#B10DC9', '#FFDC00', '#7FDBFF', '#F012BE', '#01FF70', '#85144b', '#AAAAAA', '#000000'],
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            },
            colors: ['#0074D9', '#FF851B', '#2ECC40', '#FF4136', '#B10DC9', '#FFDC00', '#7FDBFF', '#F012BE', '#01FF70', '#85144b', '#AAAAAA', '#000000']
        },
        xaxis: {
            categories: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        },
        yaxis: [{
            labels: {
                formatter: function(val) {
				return `${val.toFixed(unit === 'GB' ? 2 : 1)} ${unit}`;
                }
            },
        }],
        grid: {
            show: true,
            borderColor: '#0d0d0d',
        }
    };

    // Create a new ApexCharts instance and render the database growth graph.
    const chartsingleDBGrow = new ApexCharts(document.querySelector("#singledbgrowthchart"), optionssingleDBGROWTH);
    chartsingleDBGrow.render();
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>