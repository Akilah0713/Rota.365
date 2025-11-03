const botaoModoEscuro = document.getElementById("modoEscuro");
const logoClaro = document.getElementById("logoClaro");
const logoEscuro = document.getElementById("logoEscuro");

// =========================================================
// VARIÁVEIS DE CAPACIDADE (SIMULADA)
// =========================================================
const CAPACIDADE_ASSENTOS = {
    padrao: 50,
    vip: 10,
    executiva: 5
};

// =========================================================
// Função para aplicar o modo escuro com persistência
// =========================================================
function aplicarModoEscuro(ativo) {
  if (ativo) {
    document.body.classList.add("dark");
    if (botaoModoEscuro) botaoModoEscuro.textContent = "☀️";
    if (logoClaro && logoEscuro) {
      logoClaro.style.display = "none";
      logoEscuro.style.display = "inline";
    }
  } else {
    document.body.classList.remove("dark");
    if (botaoModoEscuro) botaoModoEscuro.textContent = "🌙";
    if (logoClaro && logoEscuro) {
      logoClaro.style.display = "inline";
      logoEscuro.style.display = "none";
    }
  }
}

// =========================================================
// Ao carregar a página, verifica se o modo escuro estava ativo
// =========================================================
const modoEscuroAtivo = localStorage.getItem("modoEscuro") === "true";
aplicarModoEscuro(modoEscuroAtivo);

// =========================================================
// Evento do botão modo escuro
// =========================================================
if (botaoModoEscuro) {
  botaoModoEscuro.addEventListener("click", () => {
    const ativo = !document.body.classList.contains("dark");
    aplicarModoEscuro(ativo);
    localStorage.setItem("modoEscuro", ativo); // salva o estado
  });
}

// =========================================================
// CARROSSEL (Mantido o código original)
// =========================================================
const slides = document.querySelectorAll(".slide");
const anterior = document.querySelector(".anterior");
const proximo = document.querySelector(".proximo");

if (slides.length > 0 && anterior && proximo) {
  let index = 0;

  function mostrarSlide(i) {
    slides.forEach(slide => slide.classList.remove("ativo"));
    slides[i].classList.add("ativo");
  }

  proximo.addEventListener("click", () => {
    index = (index + 1) % slides.length;
    mostrarSlide(index);
  });

  anterior.addEventListener("click", () => {
    index = (index - 1 + slides.length) % slides.length;
    mostrarSlide(index);
  });

  if (document.querySelector('.carrossel')) {
    setInterval(() => {
      index = (index + 1) % slides.length;
      mostrarSlide(index);
    }, 5000);
  }

  if(slides[index]) mostrarSlide(index);
}


// =========================================================
// LÓGICA DO FORMULÁRIO DE RESERVA E SIMULAÇÃO
// =========================================================

const nomeInput = document.getElementById("nome");
const dataInput = document.getElementById("dataPartida"); 
const destinoSelect = document.getElementById("destino");
const passageirosInput = document.getElementById("passageiros");
const assentoSelect = document.getElementById("assento");
const simulacaoPrecoDiv = document.getElementById("simulacaoPreco");
const erroP = document.getElementById("erro");
const assentosDisponiveisP = document.getElementById("assentosDisponiveis"); // NOVO ELEMENTO

// Função de cálculo centralizada e robusta
function calcularPreco(kmString, passageirosString, assento) {
    let kmNumber = 0;
    
    // 1. Limpeza e Conversão de KM
    if (kmString) {
        const kmLimpo = kmString.replace(/[^0-9.]/g, ''); 
        kmNumber = Number(kmLimpo);
    }
    
    // 2. Conversão de Passageiros
    const numPassageiros = Number(passageirosString);

    // 3. Validação dos inputs numéricos e do assento
    if (isNaN(kmNumber) || kmNumber <= 0 || isNaN(numPassageiros) || numPassageiros <= 0 || !assento) {
        return { precoPorPessoa: 0, totalViagem: 0, kmBruto: '' };
    }

    let multiplicador = 0;
    
    // 4. Definição do Multiplicador de Preço
    if (assento === "padrao") {
        multiplicador = 0.5; 
    } else if (assento === "vip") {
        multiplicador = 0.65; 
    } else if (assento === "executiva") {
        multiplicador = 0.8; 
    }
    
    const precoPorPessoa = kmNumber * multiplicador;
    const totalViagem = precoPorPessoa * numPassageiros;
    
    return { precoPorPessoa, totalViagem, numPassageiros, kmBruto: kmString };
}

// Função para atualizar a área de simulação em tempo real
function atualizarSimulacao() {
    if (!destinoSelect || !passageirosInput || !assentoSelect || !simulacaoPrecoDiv) return;

    const destinoOption = destinoSelect.options[destinoSelect.selectedIndex];
    const kmString = destinoOption ? destinoOption.getAttribute("data-km") : null;
    const passageirosString = passageirosInput.value;
    const assento = assentoSelect.value;
    
    const { precoPorPessoa, totalViagem, numPassageiros } = calcularPreco(kmString, passageirosString, assento);
    
    simulacaoPrecoDiv.innerHTML = ''; 
    erroP.textContent = ''; // Limpa o erro ao mudar o input

    // NOVO: Verifica e exibe a disponibilidade de assentos
    if (assentosDisponiveisP) {
        const capacidade = CAPACIDADE_ASSENTOS[assento];
        if (capacidade) {
            assentosDisponiveisP.innerHTML = `Assentos disponíveis (${assento.toUpperCase()}): <strong>${capacidade}</strong>`;
        } else {
            assentosDisponiveisP.innerHTML = 'Selecione um assento para verificar a disponibilidade.';
        }
    }
    
    if (precoPorPessoa > 0) {
        const precoPorPessoaFormatado = precoPorPessoa.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        const totalViagemFormatado = totalViagem.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        
        simulacaoPrecoDiv.innerHTML = `
            <hr style="margin: 15px 0; border: 0; border-top: 1px solid var(--cor-sombra);">
            <p style="font-weight: 600; font-size: 16px; margin-bottom: 5px;">
                Preço por Pessoa (${assento.toUpperCase()}): 
                <strong style="color: var(--cor-acento); font-size: 18px;">${precoPorPessoaFormatado}</strong>
            </p>
            <p style="color: var(--cor-secundaria); font-size: 14px;">
                Total Estimado para ${numPassageiros} ${numPassageiros > 1 ? 'passageiros' : 'passageiro'}: ${totalViagemFormatado}
            </p>
        `;
    } 
}


// Adiciona os event listeners para atualização em tempo real
if (destinoSelect) destinoSelect.addEventListener('change', atualizarSimulacao);
if (passageirosInput) passageirosInput.addEventListener('input', atualizarSimulacao); 
if (assentoSelect) assentoSelect.addEventListener('change', atualizarSimulacao);

// Chama a função uma vez ao carregar
document.addEventListener('DOMContentLoaded', atualizarSimulacao);

// =========================================================
// LÓGICA DO BOTÃO DE CONFIRMAÇÃO
// =========================================================

const btnConfirmar = document.getElementById("confirmar");

if (btnConfirmar) {
  btnConfirmar.addEventListener("click", () => {
    
    const nome = nomeInput ? nomeInput.value.trim() : '';
    const dataPartida = dataInput ? dataInput.value : ''; 
    const destinoOption = destinoSelect.options[destinoSelect.selectedIndex];
    const destinoSelecionado = destinoOption.text;
    const kmString = destinoOption.getAttribute("data-km");
    const passageirosString = passageirosInput.value;
    const assento = assentoSelect.value;
    const resultado = document.getElementById("resultado");
    const formulario = document.getElementById("formularioReserva");

    // 1. Validação de campos vazios (usamos o required do HTML, mas o JS é um fallback)
    if (!nome || !dataPartida || destinoOption.value === "" || !passageirosString || !assento) {
      erroP.textContent = "Por favor, preencha todos os campos obrigatórios!";
      return;
    }
    
    // 2. Validação da data (deve ser futura/atual)
    const hoje = new Date();
    hoje.setHours(0, 0, 0, 0); 
    const dataSelecionada = new Date(dataPartida.replace(/-/g, '/')); 
    
    if (dataSelecionada < hoje) {
        erroP.textContent = "A data de partida deve ser igual ou posterior à data atual.";
        return;
    }

    // 3. Realiza o cálculo final
    const { precoPorPessoa, totalViagem, numPassageiros, kmBruto } = calcularPreco(kmString, passageirosString, assento);

    if (precoPorPessoa <= 0) {
        erroP.textContent = "Erro no cálculo de preço. Verifique se os dados de quilometragem e passageiros são válidos.";
        return;
    }

    // NOVO: 4. Verificação de Capacidade
    if (numPassageiros > CAPACIDADE_ASSENTOS[assento]) {
        erroP.textContent = `Desculpe, há apenas ${CAPACIDADE_ASSENTOS[assento]} assentos ${assento.toUpperCase()} disponíveis para a sua reserva.`;
        return;
    }

    erroP.textContent = "";

    // 5. Formata os valores finais e a data
    const precoPorPessoaFormatado = precoPorPessoa.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    const totalViagemFormatado = totalViagem.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    const dataFormatada = new Date(dataPartida.replace(/-/g, '/')).toLocaleDateString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric' });
    
    // 6. Exibe o Resultado
    formulario.classList.add("oculto");
    resultado.classList.remove("oculto");

    resultado.innerHTML = `
      <h2>Reserva Confirmada!</h2>
      <p><strong>Nome:</strong> ${nome}</p>
      <p><strong>Destino:</strong> ${destinoSelecionado} (${kmBruto} km)</p>
      <p><strong>Data de Partida:</strong> ${dataFormatada}</p>
      <p><strong>Passageiros:</strong> ${numPassageiros}</p>
      <p><strong>Assento:</strong> ${assento.toUpperCase()}</p>
      <h3 style="margin: 15px 0;">Preço por Pessoa: ${precoPorPessoaFormatado}</h3>
      <p style="font-size: 16px;">Total da Reserva: <strong>${totalViagemFormatado}</strong></p>
      <button id="novaReserva">Fazer nova reserva</button>
    `;

    // 7. Evento de Nova Reserva
    document.getElementById("novaReserva").addEventListener("click", () => {
      formulario.classList.remove("oculto");
      resultado.classList.add("oculto");
      nomeInput.value = "";
      if (dataInput) dataInput.value = ""; 
      destinoSelect.value = "";
      passageirosInput.value = "1"; 
      assentoSelect.value = "";
      atualizarSimulacao(); 
      if (nomeInput) nomeInput.focus(); 
    });
  });
}

// =========================
// MENU RESPONSIVO
// =========================
const menuToggle = document.getElementById('menuToggle');
const menuLinks = document.getElementById('menuLinks');

if (menuToggle && menuLinks) {
  menuToggle.addEventListener('click', () => {
    menuLinks.classList.toggle('ativo');
  });
}

// =========================================================
// FUNÇÃO DE PRÉ-SELEÇÃO DE DESTINO
// =========================================================
function preencherDestinoURL() {
    const urlParams = new URLSearchParams(window.location.search);
    const destinoURL = urlParams.get('destino');
    
    if (destinoURL && destinoSelect) {
        destinoSelect.value = decodeURIComponent(destinoURL);
        atualizarSimulacao(); 
    }
}

// Chama a função ao carregar a página de reserva
if (document.getElementById('formularioReserva')) {
    preencherDestinoURL();
}