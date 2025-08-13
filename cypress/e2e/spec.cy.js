// describe('template spec', () => {
//   it('passes', () => {
//     cy.visit('https://example.cypress.io')
//   })
// })


describe('Cadastro e Inserção de Usuários', () => {

  // URL da sua página de cadastro
  const cadastroUrl = 'http://localhost/cad_usario'; // Altere para a URL correta

  beforeEach(() => {
    // Visita a página antes de cada teste
    cy.visit(cadastroUrl);
  });

  it('deve inserir 10 usuários e verificar a tabela de listagem', () => {
    // Array para armazenar os dados dos 10 usuários
    const usuarios = [];
    for (let i = 1; i <= 10; i++) {
      usuarios.push({
        id: i,
        nome: `Usuario ${i}`,
        senha: `senha${i}`
      });
    }

    cy.get('#nome').type("ciclano")
    cy.get('#senha').type("124")
    cy.get('.btn').click()



    // Iterar sobre a lista de usuários para inserir
    usuarios.forEach((usuario, index) => {
      // 1. Preenche o formulário
      cy.get('#id').clear().type(usuario.id);
      cy.get('#nome').clear().type(usuario.nome);
      cy.get('#senha').clear().type(usuario.senha);

      // 2. Clica no botão "Cadastrar"
      cy.get(':nth-child(1) > form > #submitButton').click();
      

      cy.get(':nth-child(2) > form > #submitButton').click();

     
      
    });
  });

});