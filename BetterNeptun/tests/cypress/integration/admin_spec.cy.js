describe('Add student', () => {
    it('succesfully added student', () => {
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

    it('succesfull login with registered user', () => {
        cy.visit('/login');
        cy.get('#neptunCode').type('IKE584');
        cy.get('#password').type('15963');
        cy.contains('button', 'Bejelentkezés').click();
    });
});

describe('Update student information', () => {
    it('succesfully added student', () => {
        cy.visit('/login');
        cy.get('#neptunCode').type('N4PVV4');
        cy.get('#password').type('123456');
        cy.contains('button', 'Bejelentkezés').click();

        cy.contains('a', 'Update Student Information').click();
        cy.get('#neptunCode').type('N4PVV4');
        cy.get('#name').type('Varró Bence');
        cy.get('#newNeptunCode').type('ASDASD');
        cy.contains('button', 'Update').click();
    });
});

describe('Add subject', () => {
    it('succesfully added student', () => {
        cy.visit('/login');
        cy.get('#neptunCode').type('N4PVV4');
        cy.get('#password').type('123456');
        cy.contains('button', 'Bejelentkezés').click();

        cy.contains('a', 'Add Subject').click();
        cy.get('#subjectName').type('Valószínűség számítás gy.');
        cy.get('#subjectCode').type('NBT-124');
        cy.get('#room').type('C-124');
        cy.contains('button', 'Add Subject').click();
    });
});

describe('Add grade', () => {
    it('succesfully added student', () => {
        cy.visit('/login');
        cy.get('#neptunCode').type('N4PVV4');
        cy.get('#password').type('123456');
        cy.contains('button', 'Bejelentkezés').click();

        cy.contains('a', 'Add Grade').click();
        cy.get('#subjectName').type('Valószínűség számítás gy.');
        cy.get('#grade').type('5');
        cy.get('#neptunCode').type('ZDEN48');
        cy.contains('button', 'Save').click();
    });
})