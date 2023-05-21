describe('Login', () => {
    it('succesfully loads', () => {
        cy.visit('/login')
    });

    it.only('succesfull login', () => {
        cy.visit('/login');
        cy.get('#neptunCode').type('N4PVV4');
        cy.get('#password').type('123456');
        cy.contains('button', 'Bejelentkezés').click();
    });
});