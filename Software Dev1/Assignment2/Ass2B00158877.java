/*************************************************
 Name: Robert Leniston
 Student Number: B00158877
 Module: CFSM H1014 - Software Development 1
 Assignment: Vending Machine
 ************************************************/

import java.util.Scanner;
import java.text.DecimalFormat;

class Ass2B00158877 {//Beginning of main method


    public static void main(String[] args) {

        Scanner myinput = new Scanner(System.in);

            // variable declarations
            double coffeePrice = 2.00;
            double teaPrice = 2.00;
            double soupPrice = 2.00;
            double waterPrice = 1.50;

            // Variables to track count items and total money due
            int coffeeCount = 0;
            int teaCount = 0;
            int waterCount = 0;
            int soupCount = 0;
           // double totalMoneyDue = 0.0;

            int userschoice; // variable to record choice


        do { //beginning of do while loop
            // prompts user to select an option
            System.out.println("Please choose an option between 1 - 5");
            System.out.println();
            System.out.println("*****************************");
            System.out.println("*  Vending Machine Options  *");
            System.out.println("*****************************");
            System.out.println();
            System.out.println("1. Coffee €2.00");
            System.out.println("2. Tea €2.00");
            System.out.println("3. Soup €2.00");
            System.out.println("4. Water €1.50");
            System.out.println("5. Finish and pay");
            //System.out.println();
            System.out.print("Enter your choice: ");
            //System.out.println();

            userschoice = myinput.nextInt();// records the option the user chose

            switch (userschoice) {
                case 1:
                    coffeeCount++;
                    System.out.println("You have chosen Coffee.");
                    System.out.println();
                    break;

                case 2:
                    teaCount++;
                    System.out.println("You have chosen Tea.");
                    System.out.println();
                    break;

                case 3:
                    waterCount++;
                    System.out.println("You have chosen Soup.");
                    System.out.println();
                    break;

                case 4:
                    soupCount++;

                    System.out.println("You have chosen Water.");
                    System.out.println();
                    break;

                case 5:
                    displaySummary(coffeeCount, teaCount,soupCount,waterCount);
                    break;

                // ensures only options 1 to 5 can be selected
                default:
                    System.out.println("Invalid choice, options 1-5 only!");
                    System.out.println();
                    break;
            }
        } while (userschoice != 5);

       // displaySummary(coffeeCount, teaCount, soupCount, waterCount); //calling the method to display the summary further on in the code

}
    public static void displaySummary(int coffeeCount, int teaCount, int soupCount, int waterCount) { // start of display summary method

	DecimalFormat df = new DecimalFormat("0.00");

        System.out.println();
        System.out.println("You have ordered: " + coffeeCount + " Coffee");
        System.out.println("You have ordered: " + teaCount + " Tea");
        System.out.println("You have ordered: " + soupCount + " Soup");
        System.out.println("You have ordered: " + waterCount + " Water");
        System.out.println();

        double totalMoneyDue = (coffeeCount * 2.00) + (teaCount * 2.00) + (soupCount * 2.00) + (waterCount * 1.50);
        System.out.println();
        System.out.println("Total order cost: €" + df.format(totalMoneyDue));
        System.out.println();

    } // end of display summary method



} // end of main method
