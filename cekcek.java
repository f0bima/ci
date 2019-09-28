import java.util.Scanner;
public class Segitiga{

     public static void main(String []args){
        Scanner inputsisi = new Scanner(System.in);
        int[] in = {5,7,3};
        String[] sisi = {"X", "Y", "Z"};
        
        for (int i = 0; i < 3; i++) {
            int temp = 0;
            do {
                 System.out.print("Masukan Sisi " + sisi[i] +": ");
                 temp = inputsisi.nextInt()                
            } while (temp <=0);
             in[i] = temp;
        }
        
        for (int i = 0; i < 2; i++) {
            for (int j = 0; j < 2-i; j++) {
                if(in[j]>in[j+1]){
                    int x = in[j+1];
                    in[j+1] = in[j];
                    in[j] = x;
                }
            }
        }
        
        
        if(in[0]+in[1]>in[2]){
            System.out.println("True");
        }
        else{
            System.out.println("False");
        }
        
     }
}
