describe('Login', () => {
    it('succesfully loads', () => {
        cy.visit('/login');
    });

    it('succesfull login', () => {
        cy.visit('/login');
        cy.get('#neptunCode').type('N4PVV4');
        cy.get('#password').type('123456');
        cy.contains('button', 'Bejelentkezés').click();
    });

    it('empty neptun code', () => {
        cy.visit('/login');
        cy.get('#neptunCode').type('');
        cy.get('#password').type('123456');
        cy.contains('button', 'Bejelentkezés').click();
        cy.on('window:alert',(txt)=>{
            expect(txt).to.contains('Kérjük, töltse ki ezt a mezőt.')});
    });
});