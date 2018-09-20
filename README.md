# Homework 02 - Points **55**

## Instructions

### 00 - Setup

#### Install Slim Dependencies

1. **Accept** the Homework #2 in Canvas.
2. **Open** a terminal to the root directory of the assignment.
3. **Execute** `composer install`.
4. **Execute** `composer start`.
5. **Open** a browser of your choice.
6. **Navigate** to `http://localhost:8080`.
    7. Do you see `Welcome to !`?
    8. Use <CTRL-C> to exit `composer start`.

### 01 - Using Twig Templates

#### Change Existing Templates

- Change the home page to say `Welcome to Homework #2!`.
- Change the home page title tag to say `Twig - Homework #2`.
- Change the 404 page to say `You don't find Chuck Norris, Chuck Norris finds you!` with this [image](https://www.mrctv.org/sites/default/files/uploads/chucknorris.jpg) below the text.  *Do not worry about alignment*.
    - **NOTE**: Resize the image to reasonable dimensions.
    - **NOTE**: To see the 404 page **navigate** to `http://localhost:8888/not-here`;
    - Why is the 404 page in the browser different than the acceptance test?

#### Create a New Twig Template with a Filter and Function

- Create a new new file in the `templates/` directory named `cookies.html.twig`.
- Edit the file named `cookies.html.twig`.
- Using Twig syntax, assign a variable named `hour` the current hour in military time.
- Display the text `Time: ?` where `?` is the current date and time (hint: *"Y-m-d H:i:s"*) in military time.
- If the variable `hour` is greater than or equal to 9 and is less than 17 display `Time for cookies!`.  Otherwise, display `Time to bake more cookies!`.
- Using Twig syntax include the file `cookies.html.twig` in the twig file named `index.html.twig`.
