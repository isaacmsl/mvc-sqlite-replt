const linhasTabela = document.querySelectorAll("table tr:not(:first-child)")

let lastUsuarioDados
let lastIndexLinhaTabela
let lastTdsLinhas
let isAlterandoLinha = false

function alterarLinha(index) {
    if (!isAlterandoLinha) {

        isAlterandoLinha = true
        lastIndexLinhaTabela = index
        
        lastLinhaTabela = linhasTabela[index]
        const tdsLinha = linhasTabela[index].querySelectorAll("td:not(:last-child)")
        lastTdsLinhas = tdsLinha

        lastUsuarioDados = [
            tdsLinha[1].textContent,
            tdsLinha[2].textContent,
            tdsLinha[3].textContent
        ]

        // não deixar editar o id
        setContentEditable(true)

        // inicia a editar pelo nome
        tdsLinha[1].focus()

        mudarIconeLinkRemover("x.svg")
        mudarHrefLinkRemover("javascript:cancelarAlterar()")
        mudarTitleLinkRemover("Cancelar")

        mudarIconeBtnEditar("check.svg")
        mudarOnclickBtnEditar("javascript:alterarUsuario()")
        mudarTitleBtnEditar("Salvar")
    }
}

function setContentEditable(contentEditable) {
    if (isAlterandoLinha) {
        for(let i = 1; i < lastTdsLinhas.length; i++) {
            lastTdsLinhas[i].setAttribute("contentEditable", contentEditable)
        }   
    }   
}

function mudarIconeLinkRemover(icone) {
    if (isAlterandoLinha) {
        const img = linhasTabela[lastIndexLinhaTabela].querySelector("a > img")

        img.src = `../assets/${icone}`
    }
} 

// MUDAR HREF DO LINK REMOVER AO CLICAR EM EDITAR

let lastHrefLinkRemover

function mudarHrefLinkRemover(newHref) {
    if (isAlterandoLinha) {
        const linkRemover = linhasTabela[lastIndexLinhaTabela].querySelector("a")
        lastHrefLinkRemover = linkRemover.getAttribute("href")

        linkRemover.setAttribute("href", newHref)
    }   
}

function mudarTitleLinkRemover(newTitle) {
    if (isAlterandoLinha) {
        const linkRemover = linhasTabela[lastIndexLinhaTabela].querySelector("a")

        linkRemover.setAttribute("title", newTitle)
    }   
}

function mudarIconeLinkRemover(icone) {
    if (isAlterandoLinha) {
        const img = linhasTabela[lastIndexLinhaTabela].querySelector("a > img")

        img.src = `../assets/${icone}`
    }
} 

// MUDAR ONCLICK DO BTN EDITAR AO CLICAR EM EDITAR

function mudarIconeBtnEditar(icone) {
    if (isAlterandoLinha) {
        const img = linhasTabela[lastIndexLinhaTabela].querySelector("button > img")

        img.src = `../assets/${icone}`
    }
} 

let lastOnclickBtnEditar

function mudarOnclickBtnEditar(newOnclick) {
    if (isAlterandoLinha) {
        const btnEditar = linhasTabela[lastIndexLinhaTabela].querySelector("button")
        lastOnclickBtnEditar = btnEditar.getAttribute("onclick")

        btnEditar.setAttribute("onclick", newOnclick)
    }   
}

function mudarTitleBtnEditar(newTitle) {
    if (isAlterandoLinha) {
        const btnEditar = linhasTabela[lastIndexLinhaTabela].querySelector("a")

        btnEditar.setAttribute("title", newTitle)
    }   
}

// CANCELANDO A ALTERAÇÃO DE linhasTabela

function cancelarAlterar(linhaTabela) {
    if (isAlterandoLinha) {
        resetarTdsLinha()
        resetOpcoesLinha()
        isAlterandoLinha = false
    }
}

// ALTERAR USUÁRIO

function alterarUsuario() {
    if (isAlterandoLinha) {
        const usuarioAtualizado = {
            id: lastTdsLinhas[0].textContent,
            nome: lastTdsLinhas[1].textContent,
            email: lastTdsLinhas[2].textContent,
            senha: lastTdsLinhas[3].textContent
        }  

        const form = simularForm(usuarioAtualizado);

        resetOpcoesLinha()
        isAlterandoLinha = false

        form.submit();
    }
}

function resetarTdsLinha() {
    if (isAlterandoLinha) {
        for(let i = 1; i < lastTdsLinhas.length; i++) {
            lastTdsLinhas[i].textContent = lastUsuarioDados[i - 1]
        }
    }
}


function resetOpcoesLinha() {
    if (isAlterandoLinha) {
        mudarIconeLinkRemover("trash.svg")
        mudarHrefLinkRemover(lastHrefLinkRemover)
        mudarTitleLinkRemover("Remover")

        mudarIconeBtnEditar("edit.svg")
        mudarOnclickBtnEditar(lastOnclickBtnEditar)
        mudarTitleBtnEditar("Editar")

        setContentEditable(false)

        isAlterandoLinha = false
        lastHrefLinkRemover = null
        contentEditable = null
        lastOnclickBtnEditar = null
        lastIndexLinhaTabela = null
        
    }
}

function simularForm(usuarioAtualizado) {
    const form = document.createElement('form')
    form.method = 'post'
    form.action = `/actions/usuario.php?acao=atualizar&id=${usuarioAtualizado.id}`

    for (let key of Object.keys(usuarioAtualizado)) {
        const input = document.createElement('input')
        input.name = key
        input.type = 'hidden'
        input.value = usuarioAtualizado[key]
        form.appendChild(input)
    }

    document.body.appendChild(form)

    return form
}