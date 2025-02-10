[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-22041afd0340ce965d47ae6ef1cefeee28c7c493a6346c4f15d667ab976d596c.svg)](https://classroom.github.com/a/1Ee7W2R2)
# secure_checkout
Purchase Items Use Case (main flow of events):

1. The user asks the system to display the items for sale.
2. The system displays the items with prices and a way to indicate quantity desired.
3. The user identifies the quantity of each and sends the information to the system.
4. The system calculates the subtotal and displays it to the user.
5. The user confirms the amount.
6. The system displays the subtotal, tax due, and the grand total to the user.
7. The user indicates that it is time to checkout.
8. The system securely asks for credit card information.
9. The user enters the private credit card information.
10. The system processes the transaction and replies with a confirmation.

Alternative flow (invalid input):

1. If the input, in step 3 of the main flow, is not numeric the input is ignored.

Alternative flow (restart):

1. If the user, in step 7 of the main flow, decides to continue shopping the system should provide a way to return to the first step of the main flow.

Alternative flow (authentication):

1. Before sensitive information is entered, as in step 8, the user must be authenticated to the system.

Special Requirements:

1. The system must be easy to use.
2. The system must be responsive and available.
3. The user's privacy must be respected.
4. The system must be secure.
5. The system must validate input appropriately and provide adequate feedback.

Implementation Requirements:

1. Validate all input using a test_input function (see w3schools PHP Form Validation example).
2. Place functions (like test_input and credit_card_validation) in separate files to promote reuse (see PHP Include).
3. Implement a login page that allows end users to purchase items if and only if their usernames and passwords match.  Neither the username nor the password may be blank.
4. Prevent unauthorized access to the pages used in the checkout process by redirecting unauthenticated users back to the start (i.e., homepage).
