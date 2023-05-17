<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "car_rental_system";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$query1 = "SELECT DISTINCT brand FROM car ORDER BY brand";
$result1 = mysqli_query($connect, $query1);
$options1 = "";
while($row1 = mysqli_fetch_array($result1))
{
    $options1 = $options1."<option>$row1[0]</option>";
}


$query2 = "SELECT DISTINCT model FROM car ";
$result2 = mysqli_query($connect, $query2);
$options2 = "";

while($row2 = mysqli_fetch_row($result2))
{   
    $options2 = $options2."<option>$row2[0] </option>";
}



$query3 = "SELECT DISTINCT color FROM car ORDER BY color";
$result3 = mysqli_query($connect, $query3);
$options3 = "";
while($row3 = mysqli_fetch_array($result3))
{
    $options3 = $options3."<option>$row3[0]</option>";
}



$query4 = "SELECT DISTINCT release_year FROM car ORDER BY release_year";
$result4 = mysqli_query($connect, $query4);
$options4 = "";
while($row4 = mysqli_fetch_array($result4))
{
    $options4 = $options4."<option>$row4[0]</option>";
}


$query6 = "SELECT DISTINCT seats FROM car ORDER BY seats";
$result6 = mysqli_query($connect, $query6);
$options6 = "";
while($row6 = mysqli_fetch_array($result6))
{
    $options6 = $options6."<option>$row6[0]</option>";
}



$query7 = "SELECT DISTINCT location FROM office ORDER BY location";
$result7 = mysqli_query($connect, $query7);
$options7 = "";
while($row7 = mysqli_fetch_array($result7))
{
    $options7 = $options7."<option>$row7[0]</option>";
}


$query8 = "SELECT DISTINCT city FROM office ORDER BY city";
$result8 = mysqli_query($connect, $query8);
$options8 = "";
while($row8 = mysqli_fetch_array($result8))
{
    $options8 = $options8."<option>$row8[0]</option>";
}

?>






<?php
require('connection.php');
$query_string = $_SERVER['QUERY_STRING'];
$data = explode('=',$query_string);
if($data[0] == 'delete'){
    $query = "DELETE FROM car WHERE plate_number = '$data[1]'";
    $sql = $con->prepare($query);    
    $sql->execute();
}
?>









<?php
require('connection.php');


$sobhy ="";
$i=0;
$j=0;
$k=0;

$flag=False;


 if(isset($_POST['Search']))
 {
    $min=$_POST['minimum'];
    $max=$_POST['maximum'];

 //Check if User Enter Specific Brand
 if (isset($_POST['brand']))
 {
    //Check if User Enter Multiple Brands Using Checkbox
    $i = 0;
    $selectedOptionCount = count($_POST['brand']);
    $selectedOption = "";
    while ($i < $selectedOptionCount) {
        $selectedOption = $selectedOption . "'" . $_POST['brand'][$i] . "'";
        if ($i < $selectedOptionCount - 1) {
            $selectedOption = $selectedOption . ", ";
        }
        
        $i ++;
    }
    $query="select * FROM car as c join office as o on o.office_id=c.office_id   where c.brand in (" . $selectedOption . ") AND c.price BETWEEN '$min' AND '$max'  ";

    $flag=True;
 }



 

 //Check if User Enter Specific Model
 if (isset($_POST['model']))
 {
    //Check if User Enter Multiple Model Using Checkbox

    $i = 0;
    $selectedOptionCount = count($_POST['model']);
    $selectedOption = "";
    while ($i < $selectedOptionCount) {
        $selectedOption = $selectedOption . "'" . $_POST['model'][$i] . "'";
        if ($i < $selectedOptionCount - 1) {
            $selectedOption = $selectedOption . ", ";
        }
        
        $i ++;
    }
    #Flag=True --> means that user  entered specific brand concatenate to string "query"
    if($flag==True)
    {
   
    $query =$query." AND c.model in (" . $selectedOption . ")" ;
    }
    #Flag=False --> means that user didn't enter specific brand so write query from begining
    else
    {
        
        $query="select * FROM car as c join office as o on o.office_id=c.office_id   where c.model in (" . $selectedOption . ")   AND c.price BETWEEN '$min' AND '$max'";
        $flag=True;

    }
 }




 //Check if User Enter Specific Color

 if (isset($_POST['color']))
 {
    //Check if User Enter Multiple Colors Using Checkbox

    $i = 0;
    $selectedOptionCount = count($_POST['color']);
    $selectedOption = "";
    while ($i < $selectedOptionCount) {
        $selectedOption = $selectedOption . "'" . $_POST['color'][$i] . "'";
        if ($i < $selectedOptionCount - 1) {
            $selectedOption = $selectedOption . ", ";
        }
        
        $i ++;
    }
    #Flag=True --> means that user  entered specific brand or model so concatenate to string "query"

    if($flag==True)
    {
    $query =$query." AND c.color in (" . $selectedOption . ")"  ;
    }
    #Flag=False --> means that user didn't enter specific brand or model  so write query from begining

    else
    {
        $query="select * FROM car as c join office as o on o.office_id=c.office_id   where c.color in (" . $selectedOption . ")  AND (c.price BETWEEN '$min' AND '$max')";
        $flag=True;

    }
 }


 //Check if User Enter Specific release_year

 if (isset($_POST['release_year']))
 {
    //Check if User Enter Multiple release_years Using Checkbox
    $i = 0;
    $selectedOptionCount = count($_POST['release_year']);
    $selectedOption = "";
    while ($i < $selectedOptionCount) {
        $selectedOption = $selectedOption . "'" . $_POST['release_year'][$i] . "'";
        if ($i < $selectedOptionCount - 1) {
            $selectedOption = $selectedOption . ", ";
        }
        
        $i ++;
    }
    #Flag=True --> means that user  entered specific brand or model or color so concatenate to string "query"
    if($flag==True)
    {
    $query =$query." AND c.release_year in (" . $selectedOption . ")" ;
    }
    #Flag=False --> means that user didn't enter specific brand or model or color  so write query from begining

    else
    {
        
    $query="select * FROM car as c join office as o on o.office_id=c.office_id   where c.release_year in (" . $selectedOption . ")   AND (c.price BETWEEN '$min' AND '$max')";            }
    $flag=True;

}

 //Check if User Enter Specific Number of Seats
 if (isset($_POST['seats']))
 {
    //Check if User Enter Multiple Number of Seats Using Checkbox
    $i = 0;
    $selectedOptionCount = count($_POST['seats']);
    $selectedOption = "";
    while ($i < $selectedOptionCount) {
        $selectedOption = $selectedOption . "'" . $_POST['seats'][$i] . "'";
        if ($i < $selectedOptionCount - 1) {
            $selectedOption = $selectedOption . ", ";
        }
        
        $i ++;
    }
    #Flag=True --> means that user  entered specific brand or model or color or release year so concatenate to string "query"

    if($flag==True)
    {
    $query =$query." AND c.seats in (" . $selectedOption . ")" ;
    }
    #Flag=False --> means that user didn't enter specific brand or model or color pr release year so write query from begining
    else
    {
        $query="select * FROM car as c join office as o on o.office_id=c.office_id   where c.seats in (" . $selectedOption . ")  AND c.price BETWEEN '$min' AND '$max'";            }
        $flag=True;

        }




 if (isset($_POST['country']))
 {
    //Check if User Enter Multiple Number of Seats Using Checkbox
    $i = 0;
    $selectedOptionCount = count($_POST['country']);
    $selectedOption = "";
    while ($i < $selectedOptionCount) {
        $selectedOption = $selectedOption . "'" . $_POST['country'][$i] . "'";
        if ($i < $selectedOptionCount - 1) {
            $selectedOption = $selectedOption . ", ";
        }
        
        $i ++;
    }
    #Flag=True --> means that user  entered specific brand or model or color or release year so concatenate to string "query"

    if($flag==True)
    {
    $query =$query." AND o.location in (" . $selectedOption . ")" ;
    }
    #Flag=False --> means that user didn't enter specific brand or model or color pr release year so write query from begining
    else
    {
        
            $query="select * FROM car as c join office as o on o.office_id=c.office_id   where o.location in (" . $selectedOption . ") AND c.price BETWEEN '$min' AND '$max' ";}
            $flag=True;

    }


 if (isset($_POST['city']))
 {
    //Check if User Enter Multiple Number of Seats Using Checkbox
    $i = 0;
    $selectedOptionCount = count($_POST['city']);
    $selectedOption = "";
    while ($i < $selectedOptionCount) {
        $selectedOption = $selectedOption . "'" . $_POST['city'][$i] . "'";
        if ($i < $selectedOptionCount - 1) {
            $selectedOption = $selectedOption . ", ";
        }
        
        $i ++;
    }
    #Flag=True --> means that user  entered specific brand or model or color or release year so concatenate to string "query"

    if($flag==True)
    {
    $query =$query." AND o.city in (" . $selectedOption . ")" ;
    }
    #Flag=False --> means that user didn't enter specific brand or model or color pr release year so write query from begining
    else
    {
        $query="select * FROM car as c join office as o on o.office_id=c.office_id   where o.city in (" . $selectedOption . ")  AND c.price BETWEEN '$min' AND '$max'";            }
        $flag=True;

    }
  



    if ($flag==False)
    {
        $query = "select * FROM car where  price BETWEEN '$min' AND '$max'";

    }





     
  }
else 
{

    $query = "select * FROM car ";
}

echo $query;

$sql =  $con->prepare($query);
$result = $sql->execute();
$cars = $sql->fetchAll(PDO::FETCH_ASSOC);
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <title>view cars</title>
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    body {

        background-image: url('images/car-background.jpg');
        background-size: center;
        background-position: center center;

    }

    table {
        background-color: rgba(0, 0, 10, 0.6);


    }

    table,
    th,
    td {
        border: 2px solid;
        color: white;
    }

    img {
        height: 100px;
        width: 150px;

    }

    .tr_first {

        background-color: rgba(0, 0, 10, 0.7);

    }

    .wrapper {
        width: 100%;
        overflow: auto;
        height: 80vh;
    }

    .container {
        width: 95%;
    }
    </style>

</head>

<body>
    <div class="wrapper">
        <table class="table">
            <thead>
                <tr class="tr_first">
                    <th scope="col">plate_number</th>
                    <th scope="col">brand</th>
                    <th scope="col">model</th>
                    <th scope="col">release_year</th>
                    <th scope="col">color</th>
                    <th scope="col">price</th>
                    <th scope="col">seats</th>
                    <th scope="col">office_id</th>
                    <th scope="col">state</th>




                </tr>
            </thead>
            <tbody>
                <?php foreach($cars as $car): ?>
                <tr>

                    <td><?php echo $car['plate_number'];?></td>
                    <td><?php echo $car['brand'];?></td>
                    <td><?php echo $car['model'];?></td>
                    <td><?php echo $car['release_year'];?></td>
                    <td><?php echo $car['color'];?></td>
                    <td><?php echo $car['price'];?></td>
                    <td><?php echo $car['seats'];?></td>
                    <td><?php echo $car['office_id'];?></td>
                    <td><?php echo $car['state'];?></td>


                    <td>
                        <a href="<?php echo $_SERVER['PHP_SELF'] .'?delete='.$car['plate_number']?>"><i
                                class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>


                <?php endforeach; ?>



            </tbody>
        </table>
    </div>
    <div class="container">
        <form method="post" action="cars view.php">
            <div class="row">
                <div class="col ">


                    <label>Brand</label>
                    <select style='width: 15%' name="brand[]" id="brand[]" multiple multiselect-search="true"
                        multiselect-select-all="true" onchange="console.log(this.selectedOptions)">
                        <?php echo $options1;?>
                    </select>

                    <label>Country</label>
                    <select style='width: 15%' name="country[]" id="country[]" multiple multiselect-search="true"
                        multiselect-select-all="true" onchange="console.log(this.selectedOptions)">
                        <?php echo $options7;?>
                    </select>


                    <label>City</label>
                    <select style='width: 15%' name="city[]" id="city[]" multiple multiselect-search="true"
                        multiselect-select-all="true" onchange="console.log(this.selectedOptions)">
                        <?php echo $options8;?>
                    </select>



                    <label>Model</label>
                    <select name="model[]" id="model[]" multiple multiselect-search="true" multiselect-select-all="true"
                        onchange="console.log(this.selectedOptions)">
                        <?php echo $options2;?>
                    </select>

                    <label>Color</label>
                    <select name="color[]" id="color[]" multiple multiselect-search="true" multiselect-select-all="true"
                        onchange="console.log(this.selectedOptions)">
                        <?php echo $options3;?>
                    </select>

                    <br>
                    <label>Release Year</label>
                    <select name="release_year[]" id="release_year[]" multiple multiselect-search="true"
                        multiselect-select-all="true" onchange="console.log(this.selectedOptions)">
                        <?php echo $options4;?>

                    </select>
                    <br>

                    <label>Number of Seats</label>
                    <select name="seats[]" id="seats[]" multiple multiselect-search="true" multiselect-select-all="true"
                        onchange="console.log(this.selectedOptions)">
                        <?php echo $options6;?>


                    </select>

                    <div class="Cost">
                        <label> Price</label>
                        <div class="price-input">
                            <div class="field">
                                <span>Min</span>
                                <input type="number" class="input-min" value="5000" name="minimum" id="minimum">
                            </div>
                            <div class="separator">-</div>
                            <div class="field">
                                <span>Max</span>
                                <input type="number" class="input-max" value="15000" name="maximum" id="maximum">
                            </div>
                        </div>
                        <div class="slider">
                            <div class="progress"></div>
                        </div>
                        <div class="range-input">
                            <input type="range" class="range-min" min="0" max="20000" value="5000" step="500">
                            <input type="range" class="range-max" min="0" max="20000" value="15000" step="500">
                        </div>
                    </div>




                    <label>StartDate</label>
                    <input name="start_date" id="start_date" type="date" value="2022-12-27">


                    <label>EndDate</label>
                    <input name="end_date" id="end_date" type="date" value="2022-12-27">

                    <br>
                    <br>
                    <br>




                    <input type="submit" name="Search" value="Search" style="margin-right:300px;">


        </form>

    </div>





    <div class="buttons"></div>
    <a href="addCar.php">
        <button class="offset-5 btn btn-success" style="width: 20%; color: white;  ">
            <h6><strong>ADD CAR</strong> </h5>


        </button <a href="addOffice.php">
        <button class="offset-5 btn btn-danger" style="width: 20%; color: white;  ">
            <h6><strong>ADD Office</strong> </h5>
        </button>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
        </script>
        <script src="multiselect-dropdown.js"></script>


</body>

</html>




<script>
var style = document.createElement('style');
style.setAttribute("id", "multiselect_dropdown_styles");
style.innerHTML = `
.multiselect-dropdown{
  display: inline-block;
  padding: 2px 5px 0px 5px;
  border-radius: 4px;
  border: solid 1px #ced4da;
  background-color: white;
  position: relative;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: right .75rem center;
  background-size: 16px 12px;
}
.multiselect-dropdown span.optext, .multiselect-dropdown span.placeholder{
  margin-right:0.5em; 
  margin-bottom:2px;
  padding:1px 0; 
  border-radius: 4px; 
  display:inline-block;
}
.multiselect-dropdown span.optext{
  background-color:lightgray;
  padding:1px 0.75em; 
}
.multiselect-dropdown span.optext .optdel {
  float: right;
  margin: 0 -6px 1px 5px;
  font-size: 0.7em;
  margin-top: 2px;
  cursor: pointer;
  color: #666;
}
.multiselect-dropdown span.optext .optdel:hover { color: #c66;}
.multiselect-dropdown span.placeholder{
  color:#ced4da;
}
.multiselect-dropdown-list-wrapper{
  box-shadow: gray 0 3px 8px;
  z-index: 100;
  padding:2px;
  border-radius: 4px;
  border: solid 1px #ced4da;
  display: none;
  margin: -1px;
  position: absolute;
  top:0;
  left: 0;
  right: 0;
  background: white;
}
.multiselect-dropdown-list-wrapper .multiselect-dropdown-search{
  margin-bottom:5px;
}
.multiselect-dropdown-list{
  padding:2px;
  height: 15rem;
  overflow-y:auto;
  overflow-x: hidden;
}
.multiselect-dropdown-list::-webkit-scrollbar {
  width: 6px;
}
.multiselect-dropdown-list::-webkit-scrollbar-thumb {
  background-color: #bec4ca;
  border-radius:3px;
}
.multiselect-dropdown-list div{
  padding: 5px;
}
.multiselect-dropdown-list input{
  height: 1.15em;
  width: 1.15em;
  margin-right: 0.35em;  
}
.multiselect-dropdown-list div.checked{
}
.multiselect-dropdown-list div:hover{
  background-color: #ced4da;
}
.multiselect-dropdown span.maxselected {width:100%;}
.multiselect-dropdown-all-selector {border-bottom:solid 1px #999;}
`;
document.head.appendChild(style);

function MultiselectDropdown(options) {
    var config = {
        search: true,
        height: '15rem',
        placeholder: 'select',
        txtSelected: 'selected',
        txtAll: 'All',
        txtRemove: 'Remove',
        txtSearch: 'search',
        ...options
    };

    function newEl(tag, attrs) {
        var e = document.createElement(tag);
        if (attrs !== undefined) Object.keys(attrs).forEach(k => {
            if (k === 'class') {
                Array.isArray(attrs[k]) ? attrs[k].forEach(o => o !== '' ? e.classList.add(o) : 0) : (attrs[
                    k] !== '' ? e.classList.add(attrs[k]) : 0)
            } else if (k === 'style') {
                Object.keys(attrs[k]).forEach(ks => {
                    e.style[ks] = attrs[k][ks];
                });
            } else if (k === 'text') {
                attrs[k] === '' ? e.innerHTML = '&nbsp;' : e.innerText = attrs[k]
            } else e[k] = attrs[k];
        });
        return e;
    }


    document.querySelectorAll("select[multiple]").forEach((el, k) => {

        var div = newEl('div', {
            class: 'multiselect-dropdown',
            style: {
                width: config.style?.width ?? el.clientWidth + 'px',
                padding: config.style?.padding ?? ''
            }
        });
        el.style.display = 'none';
        el.parentNode.insertBefore(div, el.nextSibling);
        var listWrap = newEl('div', {
            class: 'multiselect-dropdown-list-wrapper'
        });
        var list = newEl('div', {
            class: 'multiselect-dropdown-list',
            style: {
                height: config.height
            }
        });
        var search = newEl('input', {
            class: ['multiselect-dropdown-search'].concat([config.searchInput?.class ??
                'form-control']),
            style: {
                width: '100%',
                display: el.attributes['multiselect-search']?.value === 'true' ? 'block' : 'none'
            },
            placeholder: config.txtSearch
        });
        listWrap.appendChild(search);
        div.appendChild(listWrap);
        listWrap.appendChild(list);



        el.loadOptions = () => {
            list.innerHTML = '';

            if (el.attributes['multiselect-select-all']?.value == 'true') {
                var op = newEl('div', {
                    class: 'multiselect-dropdown-all-selector'
                })
                var ic = newEl('input', {
                    type: 'checkbox'
                });
                op.appendChild(ic);
                op.appendChild(newEl('label', {
                    text: config.txtAll
                }));

                op.addEventListener('click', () => {
                    op.classList.toggle('checked');
                    op.querySelector("input").checked = !op.querySelector("input").checked;

                    var ch = op.querySelector("input").checked;
                    list.querySelectorAll(":scope > div:not(.multiselect-dropdown-all-selector)")
                        .forEach(i => {
                            if (i.style.display !== 'none') {
                                i.querySelector("input").checked = ch;
                                i.optEl.selected = ch
                            }
                        });

                    el.dispatchEvent(new Event('change'));
                });
                ic.addEventListener('click', (ev) => {
                    ic.checked = !ic.checked;
                });
                el.addEventListener('change', (ev) => {
                    let itms = Array.from(list.querySelectorAll(
                        ":scope > div:not(.multiselect-dropdown-all-selector)")).filter(e => e
                        .style.display !== 'none')
                    let existsNotSelected = itms.find(i => !i.querySelector("input").checked);
                    if (ic.checked && existsNotSelected) ic.checked = false;
                    else if (ic.checked == false && existsNotSelected === undefined) ic.checked =
                        true;
                });

                list.appendChild(op);
            }

            Array.from(el.options).map(o => {
                var op = newEl('div', {
                    class: o.selected ? 'checked' : '',
                    optEl: o
                })
                var ic = newEl('input', {
                    type: 'checkbox',
                    checked: o.selected
                });
                op.appendChild(ic);
                op.appendChild(newEl('label', {
                    text: o.text
                }));

                op.addEventListener('click', () => {
                    op.classList.toggle('checked');
                    op.querySelector("input").checked = !op.querySelector("input").checked;
                    op.optEl.selected = !!!op.optEl.selected;
                    el.dispatchEvent(new Event('change'));
                });
                ic.addEventListener('click', (ev) => {
                    ic.checked = !ic.checked;
                });
                o.listitemEl = op;
                list.appendChild(op);
            });
            div.listEl = listWrap;

            div.refresh = () => {
                div.querySelectorAll('span.optext, span.placeholder').forEach(t => div.removeChild(t));
                var sels = Array.from(el.selectedOptions);
                if (sels.length > (el.attributes['multiselect-max-items']?.value ?? 5)) {
                    div.appendChild(newEl('span', {
                        class: ['optext', 'maxselected'],
                        text: sels.length + ' ' + config.txtSelected
                    }));
                } else {
                    sels.map(x => {
                        var c = newEl('span', {
                            class: 'optext',
                            text: x.text,
                            srcOption: x
                        });
                        if ((el.attributes['multiselect-hide-x']?.value !== 'true'))
                            c.appendChild(newEl('span', {
                                class: 'optdel',
                                text: '🗙',
                                title: config.txtRemove,
                                onclick: (ev) => {
                                    c.srcOption.listitemEl.dispatchEvent(new Event(
                                        'click'));
                                    div.refresh();
                                    ev.stopPropagation();
                                }
                            }));

                        div.appendChild(c);
                    });
                }
                if (0 == el.selectedOptions.length) div.appendChild(newEl('span', {
                    class: 'placeholder',
                    text: el.attributes['placeholder']?.value ?? config.placeholder
                }));
            };
            div.refresh();
        }
        el.loadOptions();




        search.addEventListener('input', () => {
            list.querySelectorAll(":scope div:not(.multiselect-dropdown-all-selector)").forEach(d => {
                var txt = d.querySelector("label").innerText.toUpperCase();
                d.style.display = txt.includes(search.value.toUpperCase()) ? 'block' : 'none';
            });
        });

        div.addEventListener('click', () => {
            div.listEl.style.display = 'block';
            search.focus();
            search.select();
        });

        document.addEventListener('click', function(event) {
            if (!div.contains(event.target)) {
                listWrap.style.display = 'none';
                div.refresh();
            }
        });
    });
}

window.addEventListener('load', () => {
    MultiselectDropdown(window.MultiselectDropdownOptions);
});
</script>



<script>
const rangeInput = document.querySelectorAll(".range-input input"),
    priceInput = document.querySelectorAll(".price-input input"),
    range = document.querySelector(".slider .progress");
let priceGap = 0;

priceInput.forEach(input => {
    input.addEventListener("input", e => {
        let minPrice = parseInt(priceInput[0].value),
            maxPrice = parseInt(priceInput[1].value);

        if ((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max) {
            if (e.target.className === "input-min") {
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            } else {
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});

rangeInput.forEach(input => {
    input.addEventListener("input", e => {
        let minVal = parseInt(rangeInput[0].value),
            maxVal = parseInt(rangeInput[1].value);
        if ((maxVal - minVal) < priceGap) {
            if (e.target.className === "range-min") {
                rangeInput[0].value = maxVal - priceGap
            } else {
                rangeInput[1].value = minVal + priceGap;
            }
        } else {
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});
</script>