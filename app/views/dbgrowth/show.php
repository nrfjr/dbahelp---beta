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
        <div class="flex absolute right-20 top-44 h-fit items-center z-10 gap-2">
		<div class="flex gap-2 text-center text-sm">
			<label class="pt-1">View by</label>
            <select onchange="changeUnit()" name="" id="unitChanger" class="hover:bg-gray-100 cursor-pointer appearance-none border-2 border-gray-300 border-solid shadow-inner rounded-md py-1 px-4">
                <option class="cursor-pointer" selected value="GB">GigaBytes</option>
                <option class="cursor-pointer" value="MB">MegaBytes</option>
            </select>
		</div>
				<div class="flex gap-2 text-center text-sm">
			<label class="pt-1">from</label>
			<form action="<?php echo URLROOT; ?>/dbgrowths/show" method="POST">
				<select id="year-select" name="year" class="hover:bg-gray-100 cursor-pointer appearance-none border-2 border-gray-300 border-solid shadow-inner rounded-md py-1 px-4"></select>
			</form>
					</div>
		</div>

        <div class="flex w-full relative" style="height:480px;">
            <div id="dbgrowthchart" class="absolute top-0 w-full bg-gray-50 rounded-md mt-2" style="z-index:2;">
            </div>
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
	// 2020 is just sample
    const getYearsArray = () => {
        const currentYear = new Date().getFullYear();
        const years = [];

        for (let year = 2020; year <= currentYear; year++) {
            years.push(year);
        }

        return years;
    };

    const yearsArray = getYearsArray();
    console.log(yearsArray);

    const selectElement = document.querySelector('#year-select');

    for (const year of yearsArray) {
        const optionElement = document.createElement('option');
        optionElement.textContent = year;
        optionElement.value = year;
		
		if (year === <?php echo $year; ?>) {
            optionElement.selected = true;
        }

        selectElement.appendChild(optionElement);
    }
</script>

<script>
    // just a radnom number generator
    function generateRandomData(length) {
        const randomData = [];
        for (let i = 0; i < length; i++) {
            randomData.push(Math.random() * (5e+10 - 100000000) + 100000000); // You can adjust the range as needed
        }
        return randomData;
    }

    // this is the array where the graph will pull the data from
    const dbGrowthRawData = <?php echo json_encode($data) ?>;

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
    function convertBytesToMBGB(bytesValue, unit) {
        if (unit === 'MB') {
            return bytesValue / (1024 * 1024);
        } else if (unit === 'GB') {
            return bytesValue / (1024 * 1024 * 1024);
        } else {
            return bytesValue;
        }
    }
</script>

<script>
    // The currently selected unit for the database size. GB as default
    let unit = 'GB';

    // This array will contain the converted data for the database growth graph.
    const dbGrowthDataConverted = [];


    /**
     * Loops through the raw data array and converts the database growth size(byte) for each month
     * of the year to the specified unit. The converted data is then added to the
     * `dbGrowthDataConverted` array.
     *
     * @param {string} unitType The desired unit of measurement.
     * 
     * is being called in by default when rendering page.
     * then recalled again in changeUnit() function
     */
    function convertLoop(unitType) {
        // Loop through the raw data array
        for (const series of dbGrowthRawData) {
            // Convert the raw data for the current series
            const convertedSeries = {
                name: series.name,
                data: [],
            };
            for (const dataPoint of series.data) {
                // Convert the data point to MB or GB
                convertedSeries.data.push(convertBytesToMBGB(dataPoint, unitType));
            }
            // Add the converted series to the converted data array
            dbGrowthDataConverted.push(convertedSeries);
        }
    }

    const optionsDBGROWTH = {
        series: dbGrowthDataConverted,
        chart: {
            fontFamily: 'Lexend',
            height: 450,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 5,
            curve: 'smooth',
            dashArray: 0,
            colors: ['#0074D9', '#FF851B', '#2ECC40', '#FF4136', '#B10DC9', '#FFDC00', '#7FDBFF', '#F012BE', '#01FF70', '#85144b', '#AAAAAA']

        },
        title: {
            text: 'Monthly Growth',
            align: 'left'
        },
        tooltip: {
            marker: {
                show: true,
                fillColors: ['#0074D9', '#FF851B', '#2ECC40', '#FF4136', '#B10DC9', '#FFDC00', '#7FDBFF', '#F012BE', '#01FF70', '#85144b', '#AAAAAA']

            },
        },
        legend: {
            tooltipHoverFormatter: function(val) {
                return val
            },
            markers: {
                fillColors: ['#0074D9', '#FF851B', '#2ECC40', '#FF4136', '#B10DC9', '#FFDC00', '#7FDBFF', '#F012BE', '#01FF70', '#85144b', '#AAAAAA'],
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        },
        yaxis: [{
            labels: {
                formatter: function(val) {
                    return val.toFixed(unit === 'GB' ? 2 : 1) + unit;
                }
            },
        }],
        grid: {
            show: true,
            borderColor: '#0d0d0d',
        }
    };

    // By Default Convert the raw data to the currently(default) selected unit.
    convertLoop(unit)

    // Create a new ApexCharts instance and render the database growth graph.
    const chartDBGrow = new ApexCharts(document.querySelector("#dbgrowthchart"), optionsDBGROWTH);
    chartDBGrow.render();


    /**
     * Destroys and then re-renders the database growth graph.
     * is being called inside the changeUnit() function
     */
    function reRender() {
        // destroy the chart
        chartDBGrow.destroy();

        setTimeout(() => {
            // rerenders the chart
            const chartDBGrow = new ApexCharts(document.querySelector("#dbgrowthchart"), optionsDBGROWTH);
            chartDBGrow.render();
            console.log(dbGrowthDataConverted)
        }, 200)
    }


    /**
     * Changes the currently selected unit for the database size and then re-renders
     * the graph.
     * Is being called by the select tag when choosing a unitType
     */
    function changeUnit() {
        const unitSelected = document.querySelector('#unitChanger').value;
        unit = unitSelected
        console.log(unit)

        // Empties out the converted database growth array first
        dbGrowthDataConverted.splice(0, Infinity);

        // converting the database growth array from raw data, then pushing the converted data to converted database growth array
        convertLoop(unit)

        // rerender the graph
        reRender()
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>