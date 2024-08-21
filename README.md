# This program was created as a semester project of the ZWA

## (CTU - SIT winter semester 2022)

### Author: Dmitry Rastvorov

## Contents

### [Web page](#webPage)

### [Documentation](#doc)

### [Project goal](#projGoal)

### [Process](#proc)

### [Description of functionality](#descfunc)

<a name="webPage"><h2>Web page</h2></a>
🌐 Project web page can be found by [clicking here](http://zwa.toad.cz/~rastvdmy/semestralka/iCourses/src/html/user/index.php).

<a name="doc"><h2>Documentation</h2></a>
📝 The final documentation in [Czech 🇨🇿](https://github.com/UnknownPug/iCoruses/blob/main/public/doc/iCourses%20-%20Dokumentace.pdf).

📝 The final documentation in [English 🇬🇧](https://github.com/UnknownPug/iCoruses/blob/main/public/doc/iCourses%20-%20Dokumentace%20(en).pdf).

<a name="projGoal"><h2>Project goal</h2></a>

🔘 The goal of the project was to learn HTML, CSS, JavaScript, and PHP languages. To learn how web sites are created and what skills are needed to implement it.

🔘 The iCourses website is for people who want to learn how to program. On the site you will find various popular courses that have been selected according to popularity criteria, as well as materials that teachers use for their courses.

<a name="proc"><h2>Process</h2></a>

🔘 The development process consists of 4 parts: HTML 5, CSS, JavaScript, PHP 7. If the item is marked as "❌", it means that the item was not done, if the item is marked as "✅", it means that the item was completed.

🔘 This description of the process is directly linked to the project evaluation table, which you can find [by clicking here](https://docs.google.com/spreadsheets/d/15wmEuTG90pCtIcMwcXFSweAoFE6xA4QCrM20Ov7NUa4/edit#gid=2084582211).

### Client

#### JavaScript

✅ Form check using JavaScript on submit.

✅ On (all!) elements in the form, when entering data.

✅ Validation with HTML5 - Attributes required and pattern on all elements where it makes sense.

✅ Page usable even without JavaScript - In special cases, credit may be granted without this condition.

#### HTML

✅ Validity - Valid use of HTML5 doctype (https://validator.w3.org).

✅ Without warnings.

✅ Forms are accessible - **ALL** form fields have a label.

✅ HTML 5 - Using html tags: new form elements, new semantic elements.

✅ Comprehensive form - The form must have at least 4 input fields with different data types (text, number, date, etc.). These fields must work in all major browsers (Chrome, Firefox, or Safari).

#### CSS

✅ Formatting with HTML elements is not used.

✅ The style is not directly on the element.

✅ Styles outside the HTML document (using `<link>`).

❌ Skinnability - The app will have multiple looks to choose from. The layouts will be implemented using CSS. The individual layouts will differ in color and layout. The change of appearance is permanent.

✅ Print style.

✅ Media queries.

✅ CSS flexbox.

### Server

#### Validation

✅ Resistance to "malicious user" - dump to page (XSS).

✅ Resistance to double submission of the same form - Redirection after sending, checking existing data (where uniqueness makes sense).

✅ Correct evaluation and display of errors - Range of values, different number formats, space trimming, boundary and nonsense values. All on the server!

✅ Protection against CSRF - Using the CSRF token.

✅ User-filled values are not lost - Incorrectly completed forms will be rejected and returned for correction. All data will remain pre-populated. The only exception is the password fields.

✅ A clear distinction between mandatory and optional data.

#### Login

✅ User login.

✅ Passwords not in plain text.

✅ Passwords are salted.

✅ Error handling - Especially when working with the file system.

✅ User registration - The application allows new users to register via a web form.

#### Navigation

✅ Paginated lists of items.

❌ Filtered lists of items - Correct cooperation with pagination. Implemented on the server side.

❌ Sorting in lists - Implemented on the server side.

#### Ajax

✅ Ajax - Not from static data! The data must be generated by the server.

#### Front controller

✅ Routing (deciding which script will process the request) is not done by the web server. - Using mod_rewrite, all requests are first processed by the central script.

⚠️ **Confirmation image of the connected Front controller:**

<img width="570" alt="mode_rewrite enabled" src="https://github.com/UnknownPug/iCoruses/assets/73190129/47be378c-a01d-438b-bfb7-a27b00cf20a1">

### Documentation

#### Task description

✅ Assignment - Formal assignment as if it were from an external contracting authority. The assignment will include acceptance conditions. Approved by the practitioner.

#### User manual

✅ Description of site functionality - Manual.

✅ Web UI samples - AI will be commented, described.

#### Implementation description

✅ Description of the main features of the program (functionality of the main scripts) - Description of architecture, form handling, security, data processing algorithms, UML, description of the use of frameworks.

✅ Documentation in source code.

✅ Generated documentation from source code - PHPDocumentor.

<a name="descfunc"><h2>Description of functionality</h2></a>

🔘 Each page have a footer with links to instagram pages as well as the official faculty specialty website.

🔘 There should also be text in the registration and authorization section of the footer. 

🔘 After authorization, several buttons should appear in the footer of the page: 

      - "HP" (Homepage) 
      - "Course"  
      - "About Us"
      - "Contact Information"
      - "Logout"
