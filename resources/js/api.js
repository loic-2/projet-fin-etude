const axios=require('axios')

export async function store($url,$data){
    axios.post($url,$data)
    .then(res => {return res})
    .catch(err => {return err});
}

export async function show($url){
    axios.get($url)
    .then(res => {return res})
    .catch(err => {return err});
}

export async function index($url){
   const promise= await axios.get($url);
   return promise;
}

export async function update($url,$data){
    axios.put($url,$data)
    .then(res => {return res})
    .catch(err => {return err});
}

export async function drop($url){
    axios.delete($url)
    .then(res => {return res})
    .catch(err => {return err});
}