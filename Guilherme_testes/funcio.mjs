function salario (a,b){

   let salario = a * b
   let desconto1 = salario * 0.09
   let desconto2 = salario * 0.02
   let somadesconto = desconto1 + desconto2
   let valortotal = salario - somadesconto



        console.log("Salario:" + salario)
        console.log("soma do desconto:" + somadesconto )
        console.log("valor total com desconto:" + valortotal )

}

export default salario;