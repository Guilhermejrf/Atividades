const http = require('http')
let {result, result2} = require('./app')


const server = http.createServer((req, res) => {
res.StatusCode = 200;
res.setHeader=('Content-Type', 'text/plain');
res.end("A soma é: "+ result +" E a divisão é: "+ result2);
});

server.listen(3000, ()=>{
    console.log("Rodando no http://localhost:3000")})