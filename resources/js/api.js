const axios=require('axios')
axios.default.withCredentials = true;


export async function storage($url,$data){
    await axios.get('/sanctum/csrf-cookie');
    const promise= await axios.post($url,$data,{
        headers:{
            'Content-Type':'multipart/form-data'
        }
    })
    return promise;
}

export async function stocker($url,$data){
    await axios.get('/sanctum/csrf-cookie');
    const promise= await axios.post($url,$data)
    return promise;
}

export async function lockout($url,$data){
    const promise= await axios.post($url,$data)
    return promise;
}

export async function show($url){
    await axios.get('/sanctum/csrf-cookie');
    return await axios.get($url);
}

export async function index($url){
    await axios.get('/sanctum/csrf-cookie');
   const promise= await axios.get($url);
   return promise;
}

export async function update($url,$data){
    await axios.get('/sanctum/csrf-cookie');
    await axios.put($url,$data)
    .then(res => {return res})
    .catch(err => {return err});
}

export async function drop($url){
    await axios.get('/sanctum/csrf-cookie');
    await axios.delete($url)
    .then(res => {return res})
    .catch(err => {return err});
}