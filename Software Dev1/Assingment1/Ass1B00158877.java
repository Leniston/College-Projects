/*************************************************
 Name: Robert Leniston
 Student Number: B00158877
 Module: CFSM H1014 - Software Development 1
 Assignment: Cinema Ticketing System
 ************************************************/

import java.util.Scanner;
import java.text.DecimalFormat;

class Ass1B00158877 {//Beginning of main method

    public static void main(String[] args) {
        Scanner myinput = new Scanner(System.in);
        DecimalFormat df = new DecimalFormat("0.00");

        String anotherTicket;
        int ticketCount = 0; // variable to track number of tickets processed

    do {
        // variable declarations
        String movieName;
        String patronSurname;
        int totalPeople; // *tracks number of people, used for ticket price calculation*

        // input received from user for variables
        System.out.println("Please enter the name of the Movie");
        movieName = myinput.nextLine(); //stores movie name data against variable


        System.out.println("Please enter patron Surname");
        patronSurname = myinput.next(); //stores Surname data against variable

        System.out.println("Please enter the total number of patrons");
        totalPeople = myinput.nextInt(); //stores party number against variable

        while (totalPeople <= 0) { //ensures user must enter a number greater than 0
            System.out.println("Please enter enter a valid number of patrons");
            totalPeople = myinput.nextInt();
            System.out.println();
        }

        // ticket price calcualtion
        double ticketPrice = 10.50 * totalPeople;
        if (totalPeople > 6) {
            ticketPrice = 9.45 * totalPeople;
        }

        //Disp lays the final ticket details
        System.out.println("****************************************");
        System.out.println("Movie: " + movieName);
        System.out.println("Surname: " + patronSurname);
        System.out.println("Number in party: " + totalPeople);
        System.out.println("Ticket cost: €" + df.format(ticketPrice));
        System.out.println("****************************************");
        System.out.println();

        ticketCount++; // adds a value to the ticketcount variable to be displayed at the end of program

        // asks the user would they like to process another ticket while forcing their y/n input to upper case
        System.out.println("Would you like to process another ticket?");
        System.out.println();
        System.out.println("Press 'Y' to continue or 'N' to exit");
        anotherTicket = myinput.next().toUpperCase();
        myinput.nextLine(); //This prevents the prompt for the movie from being skipped if the user repeats the program
    } while (anotherTicket.equals("Y"));


        System.out.println("Total number of Tickets processed:" +ticketCount);

    }

} // end of main method



