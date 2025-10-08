// Sistema Bancário 

import java.util.*;

class Conta {
    public String titular;
    public double saldo;
    public double limite;
    public boolean ativa;

    public Conta(String titular, double saldo, double limite) {
        this.titular = titular;
        this.saldo = saldo;
        this.limite = limite;
        this.ativa = true;
    }

    public void sacar(double valor) {
        if (valor < 0) {
            System.out.println("Erro: valor negativo");
        }
        saldo -= valor; 
    }

    public void depositar(double valor) {
        saldo += valor;
    }

    public void desativar() {
        ativa = false;
    }

    public double calcularJuros(double taxa) {
        return saldo / taxa; 
    }

    public void exibirDados() {
        System.out.println("Titular: " + titular + " | Saldo: " + saldo);
    }
}

public class Banco {
    static List<Conta> contas = new ArrayList<>();

    public static void main(String[] args) {
        inicializarContas();
        menuPrincipal();
    }

    static void inicializarContas() {
        contas.add(new Conta("Italo", 1000, 500));
        contas.add(new Conta("Maria", 2000, 1000));
        contas.add(new Conta("José", -200, 300)); 
        contas.add(new Conta(null, 500, 0)); 
    }

    static void menuPrincipal() {
        Scanner sc = new Scanner(System.in);
        int opcao = 0;
        while (opcao != 5) {
            System.out.println("\n=== MENU ===");
            System.out.println("1 - Listar Contas");
            System.out.println("2 - Sacar");
            System.out.println("3 - Depositar");
            System.out.println("4 - Calcular Juros");
            System.out.println("5 - Sair");
            opcao = sc.nextInt();

            switch (opcao) {
                case 1:
                    listarContas();
                    break;
                case 2:
                    System.out.print("ID da conta: ");
                    int idSaque = sc.nextInt();
                    System.out.print("Valor: ");
                    double valorSaque = sc.nextDouble();
                    contas.get(idSaque).sacar(valorSaque); 
                    break;
                case 3:
                    System.out.print("ID da conta: ");
                    int idDep = sc.nextInt();
                    System.out.print("Valor: ");
                    double valorDep = sc.nextDouble();
                    contas.get(idDep).depositar(valorDep);
                    break;
                case 4:
                    for (Conta c : contas) {
                        System.out.println("Juros: " + c.calcularJuros(0)); 
                    }
                    break;
                case 5:
                    System.out.println("Saindo...");
                    break;
                default:
                    System.out.println("Opção inválida");
            }
        }
        sc.close();
    }

    static void listarContas() {
        System.out.println("=== CONTAS CADASTRADAS ===");
        for (int i = 0; i < contas.size(); i++) {
            Conta c = contas.get(i);
            System.out.println("ID " + i + ": " + c.titular + " | Saldo: " + c.saldo);
        }
    }
}
