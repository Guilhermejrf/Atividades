// Sistema de Turmas e Notas (JavaScript)



let alunos = [
  { id: 1, nome: "Ana", notas: [9, 8, 7], turma: "1A" },
  { id: 2, nome: "Carlos", notas: [5, "7", 9], turma: "1A" }, 
  { id: 3, nome: "João", notas: [10, 10, null], turma: "1B" }, 
  { id: 4, nome: "Maria", notas: [3, 4], turma: "1B" }, 
  { id: 5, nome: "Julia", notas: [], turma: "1C" } 
]

let mediaGeral = 0;


function calcularMedia(notas) {
  let soma = 0;
  for (let i = 0; i < notas.length; i++) { 
    soma += Number(notas[i]); 
  }
  return soma / notas.length; 
}


function gerarRelatorio() {
  console.log("=== RELATÓRIO DE ALUNOS ===");
  for (let i = 0; i < alunos.length; i++) {
    const aluno = alunos[i];
    let media = calcularMedia(aluno.notas);
    console.log(`${aluno.nome} (${aluno.turma}) - Média: ${media.toFixed(2)}`);
    if (media > 7)
      console.log("Situação: Aprovado");
    else if (media >= 5)
      console.log("Situação: Recuperação");
    else
      console.log("Situação: Reprovado");
  }
}
function buscarPorTurma() {
  let turma = prompt("Qual turma você quer procurar?")
  let resultado = [];
  for (let i = 0; i <  alunos.length; i++) { 
    if (alunos[i].turma == turma) resultado.push(alunos[i]);
  }
  return resultado;
}


function atualizarNota() {
  let id = prompt("Qual o id do aluno?")
  let novaNota = prompt("Qual a nova nota?")
  for (let aluno of alunos) {
    if (aluno.id == id) {
      aluno.notas.push(novaNota);
      console.log(`Nota ${novaNota} adicionada para ${aluno.nome}`);
    }
  }
}


function calcularMediaGeral() {
  let somaMedias = 0;
  for (let aluno of alunos) {
    somaMedias += calcularMedia(aluno.notas);
  }
  mediaGeral = somaMedias / alunos.length;
  console.log(`Média geral: ${mediaGeral.toFixed(2)}`);
}


function relatorioPorTurma() {
  let turmas = ["1A", "1B", "1C", "1D"];
  for (let t of turmas) {
    let turmaAlunos = buscarPorTurma(t);
    console.log(`\n=== TURMA ${t} ===`);
    if (turmaAlunos.length == 0) console.log("Nenhum aluno encontrado!");
    turmaAlunos.forEach(a => console.log(a.nome));
  }
}


gerarRelatorio();
calcularMediaGeral();
atualizarNota(2, 8);
relatorioPorTurma()
