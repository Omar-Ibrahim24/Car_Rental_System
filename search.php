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

$max_min_query = "SELECT max(price),min(price) FROM car ";
$max_min_result = mysqli_query($connect, $max_min_query);
$result10 = mysqli_fetch_array($max_min_result);
$maximum_price=(int)$result10[0];
$minimum_price=(int)$result10[1];
?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Car Specifications</title>

<style>
  select {width: 15%;}
</style>
  </head>


  <body>
     
    
    <div class="container">
        <form method="post" action="view.php">
      <h1>Car Specifications</h1>
      <div class="row"><div class="col ">


      <label>Brand</label>
        <select name="brand[]" id="brand[]" multiple  multiselect-search="true" multiselect-select-all="true" onchange="console.log(this.selectedOptions)">
            <?php echo $options1;?>
        </select>

      <label>Country</label>
        <select name="country[]" id="country[]" multiple  multiselect-search="true" multiselect-select-all="true" onchange="console.log(this.selectedOptions)">
            <?php echo $options7;?>
        </select>
        

        <label>City</label>
        <select name="city[]" id="city[]" multiple  multiselect-search="true" multiselect-select-all="true" onchange="console.log(this.selectedOptions)">
            <?php echo $options8;?>
        </select>


    



    
        <label>Model</label>
        <select name="model[]" id="model[]" multiple multiselect-search="true" multiselect-select-all="true" onchange="console.log(this.selectedOptions)">
        <?php echo $options2;?>
        </select>




        <label>Color</label>
        <select name="color[]" id="color[]" multiple multiselect-search="true" multiselect-select-all="true" onchange="console.log(this.selectedOptions)">
        <?php echo $options3;?>
        </select>

        <br>
        <label>Release Year</label>
        <select name="release_year[]" id="release_year[]" multiple multiselect-search="true" multiselect-select-all="true" onchange="console.log(this.selectedOptions)">
        <?php echo $options4;?>

        </select>
        <br>

        <label>Number of Seats</label>
        <select name="seats[]" id="seats[]" multiple multiselect-search="true" multiselect-select-all="true" onchange="console.log(this.selectedOptions)">
        <?php echo $options6;?>


        </select>




<div class="wrapper">
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
        <!-- <div class="slider">
            <div class="progress"></div>
        </div> -->
        <div class="range-input">
            <input type="range" class="range-min" min="0" max="100000"value="5000" step="500">
            <input type="range" class="range-max" min="0" max="100000" value="15000" step="500">
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

    






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="multiselect-dropdown.js" ></script>
  </body>
</html>

<script>
var style = document.createElement('style');
style.setAttribute("id","multiselect_dropdown_styles");
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

function MultiselectDropdown(options){
  var config={
    search:true,
    height:'15rem',
    placeholder:'select',
    txtSelected:'selected',
    txtAll:'All',
    txtRemove: 'Remove',
    txtSearch:'search',
    ...options
  };
  function newEl(tag,attrs){
    var e=document.createElement(tag);
    if(attrs!==undefined) Object.keys(attrs).forEach(k=>{
      if(k==='class') { Array.isArray(attrs[k]) ? attrs[k].forEach(o=>o!==''?e.classList.add(o):0) : (attrs[k]!==''?e.classList.add(attrs[k]):0)}
      else if(k==='style'){  
        Object.keys(attrs[k]).forEach(ks=>{
          e.style[ks]=attrs[k][ks];
        });
       }
      else if(k==='text'){attrs[k]===''?e.innerHTML='&nbsp;':e.innerText=attrs[k]}
      else e[k]=attrs[k];
    });
    return e;
  }

  
  document.querySelectorAll("select[multiple]").forEach((el,k)=>{
    
    var div=newEl('div',{class:'multiselect-dropdown',style:{width:config.style?.width??el.clientWidth+'px',padding:config.style?.padding??''}});
    el.style.display='none';
    el.parentNode.insertBefore(div,el.nextSibling);
    var listWrap=newEl('div',{class:'multiselect-dropdown-list-wrapper'});
    var list=newEl('div',{class:'multiselect-dropdown-list',style:{height:config.height}});
    var search=newEl('input',{class:['multiselect-dropdown-search'].concat([config.searchInput?.class??'form-control']),style:{width:'100%',display:el.attributes['multiselect-search']?.value==='true'?'block':'none'},placeholder:config.txtSearch});
    listWrap.appendChild(search);
    div.appendChild(listWrap);
    listWrap.appendChild(list);

    

    el.loadOptions=()=>{
      list.innerHTML='';
      
      if(el.attributes['multiselect-select-all']?.value=='true'){
        var op=newEl('div',{class:'multiselect-dropdown-all-selector'})
        var ic=newEl('input',{type:'checkbox'});
        op.appendChild(ic);
        op.appendChild(newEl('label',{text:config.txtAll}));
  
        op.addEventListener('click',()=>{
          op.classList.toggle('checked');
          op.querySelector("input").checked=!op.querySelector("input").checked;
          
          var ch=op.querySelector("input").checked;
          list.querySelectorAll(":scope > div:not(.multiselect-dropdown-all-selector)")
            .forEach(i=>{if(i.style.display!=='none'){i.querySelector("input").checked=ch; i.optEl.selected=ch}});
  
          el.dispatchEvent(new Event('change'));
        });
        ic.addEventListener('click',(ev)=>{
          ic.checked=!ic.checked;
        });
        el.addEventListener('change', (ev)=>{
          let itms=Array.from(list.querySelectorAll(":scope > div:not(.multiselect-dropdown-all-selector)")).filter(e=>e.style.display!=='none')
          let existsNotSelected=itms.find(i=>!i.querySelector("input").checked);
          if(ic.checked && existsNotSelected) ic.checked=false;
          else if(ic.checked==false && existsNotSelected===undefined) ic.checked=true;
        });
  
        list.appendChild(op);
      }

      Array.from(el.options).map(o=>{
        var op=newEl('div',{class:o.selected?'checked':'',optEl:o})
        var ic=newEl('input',{type:'checkbox',checked:o.selected});
        op.appendChild(ic);
        op.appendChild(newEl('label',{text:o.text}));

        op.addEventListener('click',()=>{
          op.classList.toggle('checked');
          op.querySelector("input").checked=!op.querySelector("input").checked;
          op.optEl.selected=!!!op.optEl.selected;
          el.dispatchEvent(new Event('change'));
        });
        ic.addEventListener('click',(ev)=>{
          ic.checked=!ic.checked;
        });
        o.listitemEl=op;
        list.appendChild(op);
      });
      div.listEl=listWrap;

      div.refresh=()=>{
        div.querySelectorAll('span.optext, span.placeholder').forEach(t=>div.removeChild(t));
        var sels=Array.from(el.selectedOptions);
        if(sels.length>(el.attributes['multiselect-max-items']?.value??5)){
          div.appendChild(newEl('span',{class:['optext','maxselected'],text:sels.length+' '+config.txtSelected}));          
        }
        else{
          sels.map(x=>{
            var c=newEl('span',{class:'optext',text:x.text, srcOption: x});
            if((el.attributes['multiselect-hide-x']?.value !== 'true'))
              c.appendChild(newEl('span',{class:'optdel',text:'🗙',title:config.txtRemove, onclick:(ev)=>{c.srcOption.listitemEl.dispatchEvent(new Event('click'));div.refresh();ev.stopPropagation();}}));

            div.appendChild(c);
          });
        }
        if(0==el.selectedOptions.length) div.appendChild(newEl('span',{class:'placeholder',text:el.attributes['placeholder']?.value??config.placeholder}));
      };
      div.refresh();
    }
    el.loadOptions();



    
    search.addEventListener('input',()=>{
      list.querySelectorAll(":scope div:not(.multiselect-dropdown-all-selector)").forEach(d=>{
        var txt=d.querySelector("label").innerText.toUpperCase();
        d.style.display=txt.includes(search.value.toUpperCase())?'block':'none';
      });
    });

    div.addEventListener('click',()=>{
      div.listEl.style.display='block';
      search.focus();
      search.select();
    });
    
    document.addEventListener('click', function(event) {
      if (!div.contains(event.target)) {
        listWrap.style.display='none';
        div.refresh();
      }
    });    
  });
}

window.addEventListener('load',()=>{
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
    
    rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);
        if((maxVal - minVal) < priceGap){
            if(e.target.className === "range-min"){
                rangeInput[0].value = maxVal - priceGap
            }else{
                rangeInput[1].value = minVal + priceGap;
            }
        }else{
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});
    </script>
    