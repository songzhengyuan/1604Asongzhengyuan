<?php 

public class Item {

    public static void main(String[] args) {

        $array[] = { 1, 2, 4, 7, 11, 15 };
        $sum = 15;

        $low = 0;
        $heigh = array.length - 1;

        for ($i = 0; $i < array.length; $i++) {
            if (array[low] + array[heigh] == $sum) {
                break;
            }else if(array[low] + array[heigh] > $sum){
                $heigh--;
            }else {
                $low++;
            }
        }
        System.out.printf("两个数分别为" + array[low] + "  " + array[heigh]);
    }

}
