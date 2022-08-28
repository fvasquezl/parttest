<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<button class="btn btn-success btn_create" id="btn_create">create box</button>

<input type="text" id="box_id" name="BoxID">


<iframe id="printf" name="printf"   src="about:blank"></iframe>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src=" https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>

    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let headers = {
        "Content-Type": "application/json",
        "Accept": "application/json, text-plain, */*",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": token
    }

    let elements = []
    let box=''
    let kits=[]
    document.querySelector('input[name="BoxID"]').addEventListener("keyup", (e) => {
        let myValue = e.target.value;
        if (e.key === "Enter") {
            if (myValue){
                if(elements.length === 1){
                    if(elements.includes(myValue)){
                        console.log('have a box-- s',box)
                        box = myValue
                    } else{
                        console.log('please input a box')
                        myValue=''
                        elements=[]
                    }
                }else {
                    if(elements.length >= 2){
                        if(myValue !== box){
                            if(kits.includes(myValue)){
                                if(compare(myValue,kits[kits.length-1])){
                                    console.log('submit form')
                                }else {
                                    console.log('elemento ya escaneado')
                                }
                            }else{
                                kits.push(myValue)
                            }
                        }else{
                            console.log('Element not kit')
                            myValue=''
                        }
                    }
                }
            }
            if (myValue){
                elements.push(myValue)
            }

            e.target.value =''

        }

        console.log('kits ---- '+ kits)
        console.log('box ---- '+ box)
         console.log(elements)
    });

    let compare = function (el1, el2){
        return el1 === el2;
    }




    $(document).ready(function () {
        let table = $('#example').DataTable();

        $('#example tbody').on('click', '.btn_press', function () {
            let data = table.row($(this).parents('tr')).data();
            let id = data[0];
            let url = "{{route('print',':id')}}"
            url = url.replace(':id',id);
            document.getElementById('printf').src = url;
        });
    });


//////////////////////////////create boxx
    document.getElementById('btn_create').addEventListener('click',function (){
        fetch('box', {
            method: 'POST',
            headers:headers
        }).then(response=>{
            return response.json()
        }).then(data =>{
            printQr(data.id)
            console.log(data.id)
        }).catch(error => console.log(error))
    })

    function printQr(id) {
        let url = "{{route('print',':id')}}"
        url = url.replace(':id',id);
        document.getElementById('printf').src = url;
    }
//////////////////////////////////////////


</script>
</body>
</html>
