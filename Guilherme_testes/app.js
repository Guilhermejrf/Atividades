let calculo = require('./calculo')
let somar = calculo.somar
let dividir = calculo.dividir

let result = somar(20, 5);
let result2 = dividir(20, 5);

module.exports = {result, result2};