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

<input type="text" id="el" name="el" />
<p id="message"></p>

<script>
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let headers = {
        "Content-Type": "application/json",
        "Accept": "application/json, text-plain, */*",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": token
    }

    async function getData(value){
        let url
        if (kits.length === 0){
            url = 'http://test.test/box/'+value
        }else {
            url = 'http://test.test/kits/'+value
        }

        const response = await fetch(url,{
            method: 'GET',
            headers:headers
        })
        const data = await response.json()
        const {id,created_at} = data
        if(!id){
            document.getElementById('message').innerHTML = 'errror'
        }else {
            if(i===0){
                box.id = id
                box.created_at = created_at
            }else{
                if (id === box.id && created_at === box.created_at){
                    document.getElementById('message').innerHTML = 'submit'
                }

                kits[i]= Object.create(kit)
                kits[i].id = id
                kits[i].created_at = created_at
            }
            i++
            document.getElementById('el').value = ''
            document.getElementById('el').focus()
        }
    }


    const box = {
        id:null,
        created_at:null
    };
    const kit = {
        id:null,
        created_at:null
    };


    const kits =[]
    let i=0


    document.querySelector('input[name="el"]').addEventListener("keyup", (e) => {
        let myValue = e.target.value;
        if (e.key === "Enter") {
            getKitData()
            async function getKitData() {
                await getData(myValue)
            }
        }
    });



</script>
</body>
</html>

