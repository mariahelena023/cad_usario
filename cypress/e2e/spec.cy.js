describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://localhost/cad_usario')
 
    cy.get('#nome').type("Fulano")
    cy.wait(500)
    cy.get('#senha').type("123")
    cy.wait(500)
    cy.get('#btn_login').click()
 
    const user_json = `[
      {
        "id": 1,
        "nome": "Lucas",
        "senha": "k2l9x8q1"
      },
      {
        "id": 2,
        "nome": "Mariana",
        "senha": "z7m3t5r8"
      },
      {
        "id": 3,
        "nome": "Carlos",
        "senha": "v8c4b1n2"
      },
      {
        "id": 4,
        "nome": "Beatriz",
        "senha": "d9f6s3h0"
      },
      {
        "id": 5,
        "nome": "Rafael",
        "senha": "m1n8k2j7"
      },
      {
        "id": 6,
        "nome": "Fernanda",
        "senha": "p4o6l9u3"
      },
      {
        "id": 7,
        "nome": "João",
        "senha": "s0x3y7z1"
      },
      {
        "id": 8,
        "nome": "Aline",
        "senha": "w5e8d6q9"
      },
      {
        "id": 9,
        "nome": "Thiago",
        "senha": "t3r9g2m5"
      },
      {
        "id": 10,
        "nome": "Camila",
        "senha": "h8y2b4k6"
      }
    ]`;

    const usuarios = JSON.parse(user_json);
  
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
 