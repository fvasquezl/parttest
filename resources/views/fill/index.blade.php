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

    function sleep(ms,data) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    async function getBoxData(value,url){
        try{
            const response = await fetch(`${url}`,{
                method: 'POST',
                    body: JSON.stringify({data:value}),
                    headers:headers
            });
            const data = await response.json();
            return data
        }
        catch(err) {
            console.log(err);
        }
    }

    let myBox={}
    let kits=[]
    document.querySelector('input[name="el"]').addEventListener("keyup", (e) => {
        let myValue = e.target.value;
        if (e.key === "Enter") {

            getKitData()
            async function getKitData() {
                if(!myBox.id && kits.length < 1)
                    await getBoxData(myValue,'/validate/box').then(
                        data => {
                            myBox = {'id':data.id,'name':data.name}
                        }
                    );
                else{
                    if (myValue !== myBox.name){
                        if (!kits.some(code => code.name === myValue)){
                            await getBoxData(myValue,'/validate/kit').then(
                                data => {
                                    kits.push({'id':data.id,'name':data.name})
                                }
                            );
                        }
                    }else{
                        console.log('submit form')
                    }
                }
            }
        }
    });



</script>
</body>
</html>

