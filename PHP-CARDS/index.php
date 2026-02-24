<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cards em Memória (DOM + map)</title> 








<style> /*o css peguei do professor, apenas mudei para a cor desejada*/
:root {
  font-family: system-ui, Arial, sans-serif;
}

body {
  margin: 0;
  padding: 20px;
  background: #f6f7fb;
  color: #90105f;
}

h1 {
  font-size: 20px;
  margin-bottom: 15px;
}

input, select, textarea {
  width: 100%;
  padding: 10px;
  border-radius: 10px;
  border: 1px solid #d8dbe6;
  outline: none;
  font-size: 14px;
  background: #fff;
  margin: 4px 0;
}

textarea {
  min-height: 90px;
  resize: vertical;
}

button {
  border: 0;
  border-radius: 12px;
  padding: 10px 12px;
  cursor: pointer;
  font-weight: 600;
  margin-top: 6px;
  background: #ec42be;
  color: #fff;
}

.card {
  background: #fff;
  padding: 12px;
  margin: 12px 0;
  border-radius: 14px;
  border: 1px solid #e7e9f3;
  box-shadow: 0 6px 16px rgba(0,0,0,.04);
}

.meta {
  font-size: 12px;
  color: #444;
  margin: 6px 0;
}

.pill {
  font-size: 12px;
  padding: 4px 8px;
  border-radius: 999px;
  background: #f1f5f9;
  margin-right: 4px;
}

.pill.high {
  background: #fee2e2;
}

.pill.medium {
  background: #ffedd5;
}

.pill.low {
  background: #dcfce7;
}

.card img {
  width: 50%;
  height: auto;
  object-fit: contain;
  margin-top: 8px;
  border-radius: 6px;
}



</style>
</head>
<body>



<h1>Cards em Memória</h1>
<form id="formCard">
<input id="title" placeholder="Título" required>


<textarea id="description" placeholder="Descrição" required></textarea>
<input type="file" id="image" accept="image/*">


<select id="priority" required>
<option value="">Prioridade</option>
<option value="Alta">Alta</option>
<option value="Média">Média</option>
<option value="Baixa">Baixa</option>
</select>

<button type="submit">Adicionar Card</button>
</form>

<input id="filter" placeholder="Filtrar por texto">

<select id="order">
  <option value="recent">Mais recentes</option>
  <option value="priority">Prioridade</option>
  <option value="title">Título</option>
         </select>


<button id="clearAll">Limpar tudo</button>
<div id="cardsContainer"></div>









<script>
let cards = [];
function render() {
  const textoFiltro = document.querySelector("#filter").value.toLowerCase();
  const tipoOrdem = document.querySelector("#order").value;

let listaVisivel = cards.filter(function(card) {

const textoCompleto = (card.title + card.description).toLowerCase();

  




if (textoCompleto.includes(textoFiltro)) {
return true;
} else {
  return false;
}
});



if (tipoOrdem === "recent") {
  listaVisivel.sort(function(a, b) {
  return b.createdAt - a.createdAt; /*exemplo da aula do vini.d(aprendi o conceito, amém)*/
  });






} else if (tipoOrdem === "priority") {
  const ordemPrioridade = ["Alta", "Média", "Baixa"];




listaVisivel.sort(function(a, b) { /*novamente vini.d aqui*/
    return ordemPrioridade.indexOf(a.priority) - ordemPrioridade.indexOf(b.priority);
});




} else if (tipoOrdem === "title") {
  listaVisivel.sort(function(a, b) {
  return a.title.localeCompare(b.title);
});
}


const container = document.querySelector("#cardsContainer");

  
if (listaVisivel.length === 0) {
container.innerHTML = "<p>Nenhum card encontrado</p>";
  return;
}


const html = listaVisivel.map(function(c) { /*boiei aqui*/
let classePrioridade = "low";



if (c.priority === "Alta") {
  classePrioridade = "high";
} else if (c.priority === "Média") {
    classePrioridade = "medium";
} else {
classePrioridade = "low";
}





//deu erro: não pode colocar classe ao inves de c. pq c. é uma variável q representa o objeto
 return `
<div class="card">
<strong>${c.title}</strong> 

<div class="meta">
<span class="pill ${classePrioridade}">
      ${c.priority}
</span>
</div>

<p>${c.description}</p>
${c.image ? `<img src="${c.image}" alt="Imagem do card" class="card-img">` : ""}

<button onclick="removeCard('${c.id}')">
Remover 
</button>
</div>
`;
  }).join(""); //duvida aq e em cima (pesquisar + ...usei onclick(aprendi na aula do prof. de oculos)*/

  container.innerHTML = html;
}





function removeCard(id) {
cards = cards.filter(function(card) {
if (card.id !== id) {
return true;
   } else {
return false;
}
  });
  render();
}





document.querySelector("#formCard").addEventListener("submit", function(evento) {
evento.preventDefault();

  const titulo = document.querySelector("#title").value.trim();
  const descricao = document.querySelector("#description").value.trim();
  const prioridade = document.querySelector("#priority").value;
  const arquivoImagem = document.querySelector("#image").files[0]; //# busca o elemento pelo seu id
  let imagemURL = "";

  
if (arquivoImagem) { /*pesquisei bastante aq*/
imagemURL = URL.createObjectURL(arquivoImagem);
  } else {
  imagemURL = "";
  }




  
const novoCard = {
  id: String(Date.now() + Math.random()), //Date.now:retorna o número de milissegundos que correu
  title: titulo,
  description: descricao,
  priority: prioridade, 
  image: imagemURL, /*faltou essa parte e deu ruim*/
  createdAt: Date.now
};




cards.push(novoCard);
this.reset();
 render();
});


document.querySelector("#filter").addEventListener("input", function() {
render();
});
document.querySelector("#order").addEventListener("change", function() {
render();
});
document.querySelector("#clearAll").addEventListener("click", function() {

cards = [];
render();
});

render(); //como deixar a img aparecendo? (pesquisar +)


</script>
</body>
</html>