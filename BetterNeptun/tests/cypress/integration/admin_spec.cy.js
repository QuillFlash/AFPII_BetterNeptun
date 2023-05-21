describe('Add student', () => {
    it('succesfull login', () => {
        cy.visit('/login');
        cy.get('#neptunCode').type('N4PVV4');
        cy.get('#password').type('123456');
        cy.contains('button', 'Bejelentkezés').click();

        cy.contains('a', 'Add student').click();
        cy.get('#name').type('Keton Beverő');
        cy.get('#neptunCode').type('IKE584');
        cy.get('#password').type('15963');
        cy.get('#email').type('example4@gmail.com');
        cy.contains('button', 'Save').click();
    });
});