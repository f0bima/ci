import java.util.Scanner;
import java.lang.Math; 
public class Super_Duper{

     public static void main(String []args){
        Scanner input = new Scanner(System.in);
        int n = 0;
        int energi = 0;
        int[] x;
        int jumlahenergi = 0;
        energi = 2*n-1;
        
        System.out.println("Masukan jumlah energi : ");
        n = input.nextInt();
        
        System.out.println("Masukan energi : ");
        String text = input.nextLine();
        // String text = "-10 20 30";
        String[] xx = text.split("\\s+");
        
        for (int i = 0; i < energi-1; i++) {
            x[i] = Integer.parseInt(xx[i]);
        }
        
        
        for (int i = 0; i < energi-1; i++) {
            for (int j = 0; j < energi-1-i; j++) {
                if(x[j] > x[j+1]){
                    int z = x[j+1];
                    x[j+1] = x[j];
                    x[j] = z;
                }
            }
        }
        
        for (int i = 0; i < energi-1; i++) {
            jumlahenergi = jumlahenergi+ Math.abs(x[i]);
        }
        
        jumlahenergi = jumlahenergi + x[energi-1];
        
        System.out.println(jumlahenergi);
//         System.out.println(xx[1]);
        
     }
}
