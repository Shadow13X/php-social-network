# Goals
- [X] Learn about modularity in php : 
    - [X] Separate data from logic.
- [X] Learn about types and type checking
- [ ] Learn about HTTP actions : GET in particular

# Project structure
- Created a folder *includes/* in the project directory. This file contains 2 files:
    - *users.php* : contains an array containing a list of users (associative arrays).
    - *utils.php* : contains the logic : functions used to act on the data: following are some functions you can implement. (of course you can implement whatever functions you judge essential for the project).
    
function | arguments | Return Type | Description
---------|-----------|-------------|------------
verify_string | `$str` | `$errors` : array | Verify is $str is a true string and log the errors in the $errors array
user_gen | `$len` : Integer | `$user` : array | Create an associative array `$user` havin 4 fields 'fname', 'lname', 'tel', 'email' (the values are random values 'fname' and 'lname' are of maximum length `$len` maximum).

# The work to do
- Change the content of a web page dynamicly based on the GET parameters (fname and len):
if `fname` is defined :
    - search for a user with the same 'fname' in the $users array.
    - dispaly his/her information into the index page.
else :
    if `len` is defined and is an INTEGER :
        - generate a random user (with random names and phone number and email) the name/email lenghts has to be less than `len`.
    else : 
        - generate a random user, the name/email lenghts is a constant number defined by you.
    - display the information about the random user in the index page.
