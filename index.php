<?php
//lógica de negócio

require "config.php"; //importar código

$rota= $_GET["rota"] ?? "teste";

//a maioria das functions posssuem essa estrutura de acessso ao BD 
//o que muda de uma para outra é o CONTEÚDO DA QUERY
function listarAnimais($con){//rota= animais
    $stmt = $con-> query("SELECT * FROM Animais");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function listarRacas($con){//rota=racas
    $stmt = $con->query("SELECT raca FROM Animais");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

function listarEspecies($con){//rota=especies
    $stmt = $con->query("SELECT especie FROM Animais");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function calcularIdadeMedia($con){//rota=mediaidade
    $stmt = $con->query("SELECT AVG(idade) AS idade_media FROM Animais");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

}

function listarServicos($con){//rota= servicos
    $stmt = $con-> query("SELECT * FROM Servicos");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }//listarServicos

function listarCategoria($con){//rota=categoria
    $stmt = $con->query("SELECT categoria FROM Servicos");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }//listarCategoria

function calcularPreco($con){//rota=preco
    $stmt = $con->query("SELECT AVG(preco) AS preco_medio FROM Servicos");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }//calcularPreco

function calcularDuracao($con){//rota=duracao
    $stmt = $con->query("SELECT AVG(duracao_minutos) AS duracao FROM Servicos");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }//calcularDuracao

function listarAnimaisServicos($con){
    $stmt = $con->query(" SELECT Animais.nome AS animal, Animais.especie, Animais.raca, Servicos.nome AS servico, Servicos.categoria, Servicos.preco,Servicos.duracao_minutos FROM Animais CROSS JOIN Servicos
    ");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}//CRIAR UMA QUERY QUE UNA AS DUAS TABELAS

switch($rota){
        case ('animais'):
        listarAnimais($con);
        break;

    case('racas'):
        listarRacas($con);
        break;

    case('especies'):
        listarEspecies($con);
        break;

    case('mediaidade'):
        calcularIdadeMedia($con);
        break;

    case('servicos'):
        listarServicos($con);
        break;

        case('categoria'):
        listarCategoria($con);
        break;

        case('preco'):
        calcularPreco($con);
        break;

        case('duracao'):
        calcularDuracao($con);
        break;

        case('animalservicos'):
        listarAnimaisServicos($con);
        break;

    default:
        teste();
}
?>
