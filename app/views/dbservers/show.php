<?php
$title = 'Database Servers';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php';

$current_tab = isset($_GET['tab']) ? $_GET['tab'] : 1;
?>

<div id="createmodal" class="hidden z-50 overflow-hidden absolute bg-gray-800 bg-opacity-30 top-0 left-0 w-full h-full">
    <div class="flex w-full h-full justify-center items-center">
        <!-- Create DB Form -->
        <div id="DBform" class="hidden flex flex-col gap-4 bg-gray-50 p-10 rounded-md"> 
                <form class="flex flex-col gap-16" action="<?php echo URLROOT; ?>/dbservers/create" method="post" id="dbs">
                    <div class="flex justify-between items-center w-full">
                        <font id="dbformtitle" class="text-2xl font-bold text-blue-700">Create Database</font>
                        <select class="rounded-lg bg-gray-100 border-gray-300 focus:outline-none focus:ring focus:ring-blue-900 p-2" name="dbtype" id="dbtype">
                            <option class="rounded-lg appearance-none focus:outline-none p-2" value="PRD">Production</option>
                            <option class="rounded-lg appearance-none focus:outline-none p-2" value="DEV">Development</option>
                        </select>
                    </div>
                    <div class="flex w-full gap-8">
                        <!-- hidden input row ID -->
                        <input id="iddb" name="iddb" class="hidden" type="text">
                        <input id="typedb" name="typedb" class="hidden" value="DBS" type="text">
                        <!-- hidden input row ID -->
                        <div class="flex justify-center flex-grow w-full flex-col gap-2">
                            <p>Hostname:</p>
                            <input id="hostnamedb" name="hostnamedb" class="p-3 border-gray-300 border-2 rounded-md focus:outline-none focus:ring focus:ring-blue-900" type="text">
                        </div>
                        <div class="flex justify-center flex-grow w-full flex-col gap-2">
                            <p>IP Address:</p>
                            <input id="ipaddressdb" name="ipaddressdb" class="p-3 border-gray-300 border-2 rounded-md focus:outline-none focus:ring focus:ring-blue-900" type="text">
                        </div>
                        <div class="flex justify-center flex-grow w-full flex-col gap-2">
                            <p>DB Version:</p>
                            <input id="dbversiondb" name="dbversiondb" class="p-3 border-gray-300 border-2 rounded-md focus:outline-none focus:ring focus:ring-blue-900" type="text">
                        </div>
                    </div>
                    <div class="flex w-full gap-8">
                        <div class="flex justify-center flex-grow w-full flex-col gap-2">
                            <p>OS:</p>
                            <input id="osdb" name="osdb" class="p-3 border-gray-300 border-2 rounded-md focus:outline-none focus:ring focus:ring-blue-900" type="text">
                        </div>
                        <div class="flex justify-center flex-grow w-full flex-col gap-2">
                            <p>OS Username:</p>
                            <input id="osunamedb" name="osunamedb" class="p-3 border-gray-300 border-2 rounded-md focus:outline-none focus:ring focus:ring-blue-900" type="text">
                        </div>
                        <div class="flex justify-center flex-grow w-full flex-col gap-2">
                            <p>OS Password:</p>
                            <input id="ospassdb" name="ospassdb" class="p-3 border-gray-300 border-2 rounded-md focus:outline-none focus:ring focus:ring-blue-900" type="text">
                        </div>
                    </div>
                    <div class="flex w-full gap-8">
                        <div class="flex justify-center flex-grow w-full flex flex-col gap-2">
                            <p>Affiliation:</p>
                            <input id="affildb" name="affildb" class="p-3 border-gray-300 border-2 rounded-md focus:outline-none focus:ring focus:ring-blue-900" type="text">
                        </div>
                    </div>
                </form>
                <div class="flex justify-end items-center w-full gap-4">
                    <button onclick="hidemodal()" class="p-2 rounded-md bg-red-500">
                        Cancel
                    </button>
                    <button id="conbtn" onclick="" form="dbs" class="p-2 rounded-md bg-green-500">
                        Create
                    </button>
                </div>  
            
        </div>
        <!-- Create DB Form -->
        <!-- Create APP Form -->
        <div id="APPform" class="hidden flex flex-col gap-4 bg-gray-50 p-10 rounded-md">
                <form class="flex flex-col gap-16" action="<?php echo URLROOT; ?>/dbservers/create" method="post" id="apps">
                    <div class="flex justify-between items-center w-full">
                        <font id="appformtitle" class="text-2xl font-bold text-green-700">Create Application</font>
                        <select class="rounded-lg bg-gray-100 border-gray-300 focus:outline-none focus:ring focus:ring-blue-900 p-2" name="apptype" id="apptype">
                            <option class="rounded-lg appearance-none focus:outline-none p-2" value="PRD">Production</option>
                            <option class="rounded-lg appearance-none focus:outline-none p-2" value="DEV">Development</option>
                        </select>
                    </div>
                    <div class="flex w-full gap-8">
                        <!-- hidden input row ID -->
                        <input id="idapp" name="idapp" class="hidden" type="text">
                        <input id="typeapp" name="typeapp" class="hidden" value="APPS" type="text">
                        <!-- hidden input row ID -->
                        <div class="flex justify-center flex-grow w-full flex-col gap-2">
                            <p>Hostname:</p>
                            <input id="hostnameapp" name="hostnameapp" class="p-3 border-gray-300 border-2 rounded-md focus:outline-none focus:ring focus:ring-green-900" type="text">
                        </div>
                        <div class="flex justify-center flex-grow w-full flex-col gap-2">
                            <p>IP Address:</p>
                            <input id="ipaddressapp" name="ipaddressapp" class="p-3 border-gray-300 border-2 rounded-md focus:outline-none focus:ring focus:ring-green-900" type="text">
                        </div>
                    </div>
                    <div class="flex w-full gap-8">
                        <div class="flex justify-center flex-grow w-full flex-col gap-2">
                            <p>OS:</p>
                            <input id="osapp" name="osapp" class="p-3 border-gray-300 border-2 rounded-md focus:outline-none focus:ring focus:ring-green-900" type="text">
                        </div>
                        <div class="flex justify-center flex-grow w-full flex-col gap-2">
                            <p>OS Username:</p>
                            <input id="osunameapp" name="osunameapp" class="p-3 border-gray-300 border-2 rounded-md focus:outline-none focus:ring focus:ring-green-900" type="text">
                        </div>
                        <div class="flex justify-center flex-grow w-full flex-col gap-2">
                            <p>OS Password:</p>
                            <input id="ospassapp" name="ospassapp" class="p-3 border-gray-300 border-2 rounded-md focus:outline-none focus:ring focus:ring-green-900" type="text">
                        </div>
                    </div>
                    <div class="flex w-full gap-8">
                        <div class="flex justify-center flex-grow w-full flex-col gap-2">
                            <p>Affiliation:</p>
                            <input id="affilapp" name="affilapp" class="p-3 border-gray-300 border-2 rounded-md focus:outline-none focus:ring focus:ring-green-900" type="text">
                        </div>
                        <div class="flex justify-center flex-grow w-full flex-col gap-2">
                            <p>Application URL:</p>
                            <input id="appurlapp" name="appurlapp" class="p-3 border-gray-300 border-2 rounded-md focus:outline-none focus:ring focus:ring-green-900" type="text">
                        </div>
                    </div>
                </form>
                <div class="flex justify-end items-center w-full gap-4">
                    <button onclick="hidemodal()" class="p-2 rounded-md bg-red-500">
                        Cancel
                    </button>
                    <button id="conbtn" onclick="" form=""apps  class="p-2 rounded-md bg-green-500">
                        Create
                    </button>
                </div> 
           
        </div>
        <!-- Create APP Form -->
    </div>

</div>

<div class="flex flex-col gap-2">
    <div class="flex justify-between">
        <h1 class="text-3xl text-black text-white">
            <b>Servers & Apps Lists</b>
        </h1>
        <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="ml-2 fas fa-redo"></i></button>
        </a>
    </div>

    <div class="z-40">
                <button id="dropdownDefault" data-dropdown-toggle="dropdown-createuser" class="inline-flex items-center text-black bg-green-300 focus:outline-none hover:bg-green-700  font-medium rounded-lg text-sm px-3 py-2  hover:text-white" type="button">
                    Create
                    <i class="fas fa-chevron-down ml-2"></i>
                </button>
                <div id="dropdown-createuser" class="whitespace-normal hidden w-fit bg-white rounded-md divide-y divide-gray-100 shadow max-h-48 overflow-y-auto scrollbar-hide">
                    <ul class="text-sm text-gray-700" aria-labelledby="dropdownDefault">
                        <li onclick="createDBmodal()">
                            <a href="#" class="transition delay-100 rounded-b-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">Database</a>
                        </li>
                        <li onclick="createAPPmodal()">
                            <a href="#" class="transition delay-100 rounded-b-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">Application</a>
                        </li>
                    </ul>
                </div>
            </div>

    <div class="overflow-x-auto relative shadow-md ">

        <div class=" border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center bg-gray-500 rounded-t-lg" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button onclick="window.history.replaceState(null, null, '?tab=1')" class="inline-block p-4 rounded-t-lg border-b-2 " id="proddb-tab" data-tabs-target="#proddb" type="button" role="tab" aria-controls="proddb" aria-selected="<?php echo setSelectTabforHTML(1, $current_tab) ?>">Production DB</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button onclick="window.history.replaceState(null, null, '?tab=2')" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent" id="prodapps-tab" data-tabs-target="#prodapps" type="button" role="tab" aria-controls="prodapps" aria-selected="<?php echo setSelectTabforHTML(2, $current_tab) ?>">Production Apps</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button onclick="window.history.replaceState(null, null, '?tab=3')" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent" id="devdb-tab" data-tabs-target="#devdb" type="button" role="tab" aria-controls="devdb" aria-selected="<?php echo setSelectTabforHTML(3, $current_tab) ?>">Development DB</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button onclick="window.history.replaceState(null, null, '?tab=4')" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent" id="devapps-tab" data-tabs-target="#devapps" type="button" role="tab" aria-controls="devapps" aria-selected="<?php echo setSelectTabforHTML(3, $current_tab) ?>">Development Apps</button>
                </li>
            </ul>
        </div>

        <div id="myTabContent">
            <?php
            foreach ($data as $maintitle => $array) {
            ?>
                <div class="hidden p-4 bg-gray-50 rounded-b-lg max-h-screen overflow-auto h-full " id="<?php echo $maintitle; ?>" role="tabpanel" aria-labelledby="<?php echo $maintitle; ?>-tab">
                    <div style="overflow:clip;height: fit-content;" class="rounded-lg">
                        <div class="block justify-center w-full shadow-md overflow-auto rounded-lg" style="max-height: 65vh;">
                            <?php

                            if (!empty($array)) {

                                //Separates Column title from result set
                                foreach ($array as $outer_key => $inner_array) {

                                    foreach ($inner_array as $inner_key => $value) {
                                        $column_names[] = $inner_key;
                                    }
                                }
                            ?>
                                <table id="<?php echo $title; ?>" class=" sortable w-full text-sm text-center text-white">
                                    <thead class="cursor-pointer text-md text-black bg-indigo-200 sticky top-0 z-10">
                                        <tr>
                                            <?php for ($title = 1; $title <= count($inner_array) - 1; $title++) { ?>
                                                <th scope="col" class="py-2 px-6">
                                                    <?php
                                                    echo $column_names[$title];
                                                    ?>
                                                </th>
                                            <?php
                                            }
                                            $column_names = [];
                                            ?>
                                            <th scope="col" class="py-2 px-6">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-500 overflow-y-auto">
                                        <?php
                                        foreach ($array as $column_title => $values) {
                                        ?>
                                            <tr id="<?php echo $values['ID']; ?>" class="transition delay-50 focus:hover:bg-gray-700 hover:bg-gray-700">
                                                <?php
                                                $foreditvalues=$values;
                                                array_splice($values, 0, 1);
                                                foreach ($values as $k => $v) {
                                                ?>
                                                    <td id="<?php echo str_replace(' ','_',$k).$foreditvalues['ID']?>" class=" item py-4  px-6">
                                                        <?php echo $v; ?>
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                                <td class=" item py-4  px-6">
                                                    <font id="<?php echo $maintitle ?>" color="#005eff" title="Edit Details">
                                                        <button type="button" <?php echo 'onclick="editmodal('.$foreditvalues['ID'].',`'.$maintitle.'`)"' ?>><i class="fas fa-pen-to-square transform  hover:bg-blue-200 rounded-md w-6 h-6"></i></button>
                                                    </font>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php
                            } else {
                            ?>
                                <div class="flex w-full shadow-md overflow-auto rounded-lg bg-gray-500" style="max-height: 80%; min-height: 100%;">
                                    <h1 class="text-white m-auto "><b>No Details Found.</b></h1>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>