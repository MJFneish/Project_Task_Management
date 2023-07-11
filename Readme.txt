#Project Task Manager :

-Description:
The task management application built with php is a web-based platform designed to help users keep track of their projects and tasks.
It provides a simple and intuitive interface for creating, editing, and organizing projects with their specific tasks, as well as tracking their progress.


#-System features:
1.User authentication: Login-Signup system for secure access to the application.
2.User profile management: Ability to edit personal information, such as name, email, password, etc...
3.Project creation: Ability to create new projects, including specifying a title, description, expired date, etc...
4.Project editing: Ability to edit existing projects, including updating the project's title, description, due date, and completion status...
5.Project deletion: Ability to delete projects that are no longer needed.
6.Task creation: Ability to create new tasks, including specifying a title, description, due date, and priority level.
7.Task editing: Ability to edit existing tasks, including updating the task's title, description, due date, and completion status...
8.Task deletion: Ability to delete tasks that are no longer needed.
9.Search and filter: Ability to search and filter projects by title, status, and other parameters.
10.Percentage of completion: Ability to see the percentage of completion for each project and overall completion percentage for all projects.


#---DEVELOPER SUPREME NOTES:
1) every action is used to be an AJAX action so that we can maintaine the provided restrictions for every action done like adding,editing,deleting, accessing...  
2) every page (excluding the login, forget_password and the reset_password pages) check the user if he is loged in or not, if not then he will be redirect to login page.
3) pages that have an action to access/ modify on database include an error-text to show them if there were an error so then they will know it.
4) before any action that will modify the database the user will get a popup message to make assurance to continue.


#---Users:
you can log in with the following preregistered users:
1) email: fneishm123@gmail.com
2) email: fneishm1234@gmail.com
3) email: Hassanalbeiruty@gmail.com

the password for all of them: 123


#---Pages Content:

I) Login Page:
    1) this page is must for the clients who are not loged in or registered.
    2) User interface:
        i) user can login or register for new account
        ii) can access the forget password page.


II) Forget Page:
    1) this page make sure the user to have access to change his own password.
    2) User interface:
        i) user must write his email to know if his was registerd before or not.
        ii) if user had an account and forget his password he can modify it.
        iii) after recieving an verification code through the email typed the user can modify his password.
        iv) after changing the password, user is redirected to login page. 

    3) Developer Notes:
        i) an SMTP is used to send the email and that is what phpmailer folder is used to be in our project.


III) Home Page:
    1) home page is responsible to show the user his projects directely so the project (Project Task Manager) achieve Performance, efficiency and quickly user interface.
    2) User interface:
        i)   user can view his own projects in home page.
        ii)  user can view stats of each project including number of tasks for each project, project's progress, project status and so on.
        iii) user can filter and search project for various search techniques including project's name , starting date, deadline date, progress, etc... 
        iv)  user can add new project from home page.
        v)   user must access each project from the home page.
    
    3) Developer Notes:
        i)   DataTable javascript library is used to design the viewing of the projects.
        ii)  by this library we used to write a json file that help us to achieve capability of reading/writing smoothly. 
        iii) a json file called "projects_dataTable.json" is always been rewrited so that if any project is new we are always up to date. 
        iv)  "projects_dataTable.json" is writed in a way that DataTable library want it.
        v)   DataTable support search and filter directely
        vi)  the add new project button take you to other page to make sure Security is achieved. 


IV) Project Page:
    1) project page is responsible to show a specific project's content including its tasks.
    2) User interface:
        i)   user can view the project content and its tasks.
        ii)  user can delete permanently and instantaneously the project through this page.
        iii) user will have permission to edit a specific project content.
        iv)  user can add new task for this project.
        v)   user can view count down for his project's deadline.

    3) Developer Notes:
        i)   to access this page you either need to have an access for it (using session) or to redirect to this page through the home page.
             Otherwise user will be redirect to the home page to choose a project.
        ii)  to view project task we used to write another json file called "current_project_tasks.json".
             it was supposed to make security more flexible but at the end we got another method to achieve security for each project's tasks.
             so instead of delete it we leave it so in the future maintenance of (Project Task Manager) we maybe use it.
        iii) the count down is achieved using the ajax sendet as json and transformed into an object so we can get the project's deadline.
        iv)  the editing and the adding new task of this project is done through another page so 'Reliability' will be achieved.


V) Project_Add Page:
    1) this page is responsible for adding new project for the user.
    2) User interface:
        i) user can add new project.

    3) Developer Notes:
        i) before pressing the button 'add project' if user change his content he can press the 'cancel' button clear the filled inputs.


VI) Project_Edit Page:
        1) this page is responsible for editing a specific project.
        2) User interface:
            i)  user can edit his project.
            ii) user can complete/ uncomplete his project. 
    
        3) Developer Notes:
            i)  before pressing the button 'save changes' if user change his content he can press the 'cancel' button data will be retrieved.
            ii) when complete the project, all related tasks will be completed also.


VII) Task Page:
    1) task page is responsible to show the specific task's content.
    2) User interface:
        i)   user can view the task content.
        ii)  user can delete permanently and instantaneously the task through this page.
        iii) user can edit the taskcontent instantaneously.
        iv)  user can view count down for this task deadline.

    3) Developer Notes:
        i)   to access this page you either need to have an access for it (using session) or to redirect to this page through the project page.
             Otherwise user will be redirect to the project page to choose a task
        ii)  the count down is achieved using the ajax sendet as json and transformed into an object so we can get the task's deadline.


VIII) Task_Add Page:
    1) this page is responsible for adding new task for a specific project.
    2) User interface:
        i) user can add new task.

    3) Developer Notes:
        i) before pressing the button 'add task' if user change his content he can press the 'cancel' button clear the filled inputs.


IX) Profile Page:
    1) this page is responsible to view the user profile and also to manage user profile directely.
    2) User interface:
        i)   user can modify a profile picture.
        ii)  user can modify his name, email and password
        iii) user can delete his account permanently.
        
    3) Developer Notes:
        i)   after saving the changes the page content will be changed also (in the sidebar...)
        ii)  when deleting the account, all connected projects and tasks will be also deleted.
        iii) before pressing the button 'save changes' if user change his content he can press the 'cancel' button to retrieve his content. 






#Developer wanted to highlight:
1)  dark/light and open/closed sidebar mode will be saved through cookies.
    every time you access a page these to cookies are also checked.

2)  in login page, when user press on login or on signup this action will be saved, and as default it is always on login side.
    so that if you go to another page or you remove this page accidentally the form (login or signup) will be loaded for you directely.

3) after logging out the saved 'current_task' and 'current_project' will also be unset.