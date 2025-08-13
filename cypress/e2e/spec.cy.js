describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://localhost/cad_usario')
 
    cy.get('#nome').type("Fulano")
    cy.wait(500)
    cy.get('#senha').type("123")
    cy.wait(500)
    cy.get('#btn_login').click()
 
    const usuarios = [];
    for (let i = 1; i <= 10; i++){
      usuarios.push({
        id: i,
        nome: `usuario ${i}`,
        senha: `senha${i}`
      });
    }
    cy.get('body')
    usuarios.forEach((usuario, index) => {
      cy.get('#nome').type(usuario.nome)
      cy.wait(500)
      cy.get('#senha').type(usuario.senha)
      cy.wait(500)
      cy.get('#btn_cadastro').click()
      cy.wait(500)
    });

    cy.get('#btn_listar').click()
  })

})
 