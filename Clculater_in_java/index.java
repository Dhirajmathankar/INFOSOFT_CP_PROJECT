import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import java.awt.image.ImageObserver;
import java.awt.image.ImageProducer;
import java.text.SimpleDateFormat;
import java.util.Date;

class base_class extends Component{
    private JFrame jFrame ;
    public JFrame base_class_jframe(){
        Image image = Toolkit.getDefaultToolkit().getImage("D:\\edit.png");
        jFrame = new JFrame();
        jFrame.setIconImage(image);
        jFrame.setVisible(true);
        jFrame.setTitle("HELLO DHIRAJ ");
        jFrame.setLayout(null);
        jFrame.setBounds(100, 100, 400, 500);
        return  jFrame;
    }
}
class component extends base_class{
    public JButton jButton, button_mc, button_mr, button_msubtract, button_maddition, button_ms, button_dropdown, button_modulo,
            button_one_upone, button_seven, button_fourth, button_one,  button_subtract_addition, button_ce, button_x_squre, button_8,
            button_5, button_2, button_0, button_c, button_x_root, button_9, button_6, button_3, button_doubte,
           button_backspace, button_multiplication, button_division, button_subtractio, button_addition, button_anserw ;
    public JTextField jTextArea ;
    public JLabel date_time_table ;


    public JLabel date_time_leble (){
        Date dNow = new Date( );
        SimpleDateFormat ft =
                new SimpleDateFormat("E yyyy.MM.dd 'at' hh:mm:ss a zzz");

        date_time_table = new JLabel();
        date_time_table.setBounds(10 , 0, 360, 55);
        date_time_table.setText(":: " + ft.format(dNow));
        return date_time_table ;

    }
//    public JTextField output_box(){
//    jTextArea = new JTextField();
//    jTextArea.setBounds(10 , 40, 360, 65);
//    new Font("Verdana", Font.BOLD, 24);
//    jTextArea.setEnabled(false);
//    return  jTextArea ;
//    }

    public JButton button_mc_func(){
        button_mc = new JButton();
        button_mc.setText("MC");
        button_mc.setBounds(10, 110, 55, 30);
        return button_mc;
    }
    public JButton button_mr_func(){
        button_mr = new JButton();
        button_mr.setText("MR");
        button_mr.setBounds(70, 110, 55, 30);
        return button_mr;
    }
    public JButton button_msubtract_func(){
        button_msubtract = new JButton();
        button_msubtract.setText("-M");
        button_msubtract.setBounds(130, 110, 55, 30);
        return button_msubtract;
    }
    public JButton button_maddition_func(){
        button_maddition = new JButton();
        button_maddition.setText("+M");
        button_maddition.setBounds(190, 110, 55, 30);
        return button_maddition;
    }
    public JButton button_ms_func(){
        button_ms = new JButton();
        button_ms.setText("MS");
        button_ms.setBounds(250, 110, 55, 30);
        return button_ms;
    }
    public JButton button_dropdown_func(){
        button_dropdown = new JButton();
        button_dropdown.setText("M^");
        button_dropdown.setBounds(310, 110, 55, 30);
        return button_dropdown;
    }


    public JButton button_modulo_func(){
        button_modulo = new JButton();
        button_modulo.setText("%");
        button_modulo.setBounds(10, 143, 85, 40);
        return button_modulo;
    }
    public JButton button_one_upone_func(){
        button_one_upone = new JButton();
        button_one_upone.setText("1/x");
        button_one_upone.setBounds(10, 186, 85, 40);
        return button_one_upone;
    }
    public JButton button_seven_func(){
        button_seven = new JButton();
        button_seven.setText("7");
        button_seven.setBounds(10, 229, 85, 40);
        return button_seven;
    }
    public JButton button_fourth_func(){
        button_fourth = new JButton();
        button_fourth.setText("4");
        button_fourth.setBounds(10, 272, 85, 40);
        return button_fourth;
    }
    public JButton button_one_func(){
        button_one = new JButton();
        button_one.setText("1");
        button_one.setBounds(10, 315, 85, 40);
        return button_one;
    }
    public JButton button_subtract_addition_func(){
        button_subtract_addition = new JButton();
        button_subtract_addition.setText("+/-");
        button_subtract_addition.setBounds(10, 358, 85, 40);
        return button_subtract_addition;
    }
    public JButton button_ce_func(){
        button_ce = new JButton();
        button_ce.setText("CE");
        button_ce.setBounds(100, 143, 85, 40);
        return button_ce;
    }
    public JButton button_x_squre_func(){
        button_x_squre = new JButton();
        button_x_squre.setText("X^2");
        button_x_squre.setBounds(100, 186, 85, 40);
        return button_x_squre;
    }
    public JButton button_8_func(){
        button_8 = new JButton();
        button_8.setText("8");
        button_8.setBounds(100, 229, 85, 40);
        return button_8;
    }
    public JButton button_5_func(){
        button_5 = new JButton();
        button_5.setText("5");
        button_5.setBounds(100, 272, 85, 40);
        return button_5;
    }
    public JButton button_2_func(){
        button_2 = new JButton();
        button_2.setText("2");
        button_2.setBounds(100, 315, 85, 40);
        return button_2;
    }
    public JButton button_0_func(){
        button_0 = new JButton();
        button_0.setText("0");
        button_0.setBounds(100, 358, 85, 40);
        return button_0;
    }
    public JButton button_c_func(){
        button_c = new JButton();
        button_c.setText("C");
        button_c.setBounds(190, 143, 85, 40);
        return button_c;
    }
    public JButton button_x_root_func(){
        button_x_root = new JButton();
        button_x_root.setText("2_/x");
        button_x_root.setBounds(190, 186, 85, 40);
        return button_x_root;
    }
    public JButton button_9_func(){
        button_9 = new JButton();
        button_9.setText("9");
        button_9.setBounds(190, 229, 85, 40);
        return button_9;
    }
    public JButton button_6_func(){
        button_6 = new JButton();
        button_6.setText("6");
        button_6.setBounds(190, 272, 85, 40);
        return button_6;
    }
    public JButton button_3_func(){
        button_3 = new JButton();
        button_3.setText("3");
        button_3.setBounds(190, 315, 85, 40);
        return button_3;
    }
    public JButton button_doubte_func(){
        button_doubte = new JButton();
        button_doubte.setText(".");
        button_doubte.setBounds(190, 358, 85, 40);
        return button_doubte;
    }
//----------------------------------------------------------------

    public JButton button_backspace_func(){
        button_backspace = new JButton();
        button_backspace.setText("<=");
        button_backspace.setBounds(280, 143, 85, 40);
        return button_backspace;
    }
    public JButton button_multiplication_func(){
        button_multiplication = new JButton();
        button_multiplication.setText("x");
        button_multiplication.setBounds(280, 186, 85, 40);
        return button_multiplication;
    }
    public JButton button_division_func(){
        button_division = new JButton();
        button_division.setText("/");
        button_division.setBounds(280, 229, 85, 40);
        return button_division;
    }
    public JButton button_subtractio_func(){
        button_subtractio = new JButton();
        button_subtractio.setText("-");
        button_subtractio.setBounds(280, 272, 85, 40);
        return button_subtractio;
    }
    public JButton button_addition_func(){
        button_addition = new JButton();
        button_addition.setText("+");
        button_addition.setBounds(280, 315, 85, 40);
        return button_addition;
    }
    public JButton button_anserw_func(){
        button_anserw = new JButton();
        button_anserw.setText("=");
        button_anserw.setBounds(280, 358, 85, 40);
        return button_anserw;
    }

//    -------------------------------------------------------------------
}


class all_operation_perfome extends component {

    //    "/ = 10", "sqrt = 11", "* = 12", "% = 13", "- = 14", "1/X = 15", "+ = 16", "= = 17" 1/x 22 , ce = 21 , _/21 , backspace = 00

    int array[] = {};

    public String digitButtonText[] = {"7", "8", "9", "4", "5", "6", "1", "2", "3", "0", "+/-", "." };
    public String operatorButtonText[] = {"/", "sqrt", "*", "%", "-", "1/X", "+", "=" };
    public String memoryButtonText[] = {"MC", "MR", "MS", "M+" };
    public String specialButtonText[] = {"Backspc", "C", "CE" };
    public component  component_index ;
    public JTextField jTextField ;
    public String couter = "";
    public int last_number = 000;
    public boolean int_float_value  = false ;
    public boolean operatore_chack = true ;
    public float calculate_value_of_sum = 0;
    public String string_temporiry = "";
    public  int int_temporiry_operatore = 0;
    public boolean frist_value = true ;
    public boolean show_anserw_type_int_float = true;

     public all_operation_perfome(){
         component_index = new component();
         System.out.println("All operaation constuction "+ Integer.parseInt("2311212"));
     }


    public JTextField output_box(){
        jTextField = new JTextField();
        jTextField.setBounds(10 , 40, 360, 65);
//        new Font("Verdana", Font.BOLD, 24);
        jTextField.setFont(new Font("Verdana", Font.BOLD, 24));
        jTextField.setEnabled(false);
        jTextField.setText("0");
        return  jTextField ;
    }


     public void calculate_the_number_of(int index){
         System.out.println(index);
         if(index == 1 ||index == 2 || index == 3 || index == 4 || index == 5 ||index == 6 || index == 7 ||index == 9 ||index == 8 ||index == 0 || index == 18){
             operatore_chack = true ;
             if(index == 18){
                 if(int_float_value == false){
                     int_float_value = true ;
                     show_anserw_type_int_float = false ;
                     couter += ".";
                     string_temporiry += ".";
                     jTextField.setText(couter);
                 }
             }else{
                 couter += index;
                 string_temporiry += index ;
                 jTextField.setText(couter);
             }
         }
         else if(index == 16 || index == 14 || index == 10 || index == 12 || index == 13 || index == 17 || index == 11 || index == 19||index == 22){
             float tem_value_store = Float.parseFloat(string_temporiry);
             if(string_temporiry != ""){
                 if(frist_value == true){
                         calculate_value_of_sum = tem_value_store;
                     System.out.println("Run...... ");
                     frist_value = false ;
                 }
             }
            if(int_temporiry_operatore != 0){
                switch (int_temporiry_operatore){
                    case 16 :
                        calculate_value_of_sum += tem_value_store;
                        System.out.println(calculate_value_of_sum);
                        break;
                    case 14 :
                        calculate_value_of_sum -= tem_value_store;
                        System.out.println(calculate_value_of_sum);
                        break;
                    case 10 :
                        calculate_value_of_sum /= tem_value_store;
                        System.out.println(calculate_value_of_sum);
                        break;
                    case 12 :
                        couter += "x";
                        calculate_value_of_sum *= tem_value_store;
                        System.out.println(calculate_value_of_sum);
                        break;
                    case 13 :
                        couter += "%";
                        calculate_value_of_sum %= tem_value_store;
                        System.out.println(calculate_value_of_sum);
                        break;

                }
            }else{
                calculate_value_of_sum = tem_value_store;
            }

             if (operatore_chack == true && couter != ""){
                 switch (index){
                     case 16 :
                         couter += "+";
                         string_temporiry = "" ;
                         int_temporiry_operatore = 16 ;
                         break;
                     case 14 :
                         couter += "-";
                         string_temporiry = "" ;
                         int_temporiry_operatore = 14 ;
                         break;
                     case 10 :
                         couter += "/";
                         string_temporiry = "" ;
                         int_temporiry_operatore = 10 ;
                         break;
                     case 12 :
                         couter += "x";
                         string_temporiry = "" ;
                         int_temporiry_operatore = 12 ;
                         break;
                     case 13 :
                         couter += "%";
                         string_temporiry = "" ;
                         int_temporiry_operatore = 13 ;
                         break;

                     case 11 :
                         if(show_anserw_type_int_float == false){
                             couter = "" + calculate_value_of_sum * calculate_value_of_sum;
                         }else {
                             couter = "" + Math.round(calculate_value_of_sum * calculate_value_of_sum);
                         }
                         string_temporiry = "";
                         int_temporiry_operatore = 11 ;
                         break;
                     case 22 :
                         couter = "" + (1/calculate_value_of_sum);
                         string_temporiry = "";
                         int_temporiry_operatore = 11 ;
                         break;

                     case 19 :
                         couter = "" + calculate_value_of_sum * 1.414;
                         string_temporiry = "";
                         int_temporiry_operatore = 19 ;
                         break;

                     case  17 :
                         if(show_anserw_type_int_float == false){
                             couter = "" + calculate_value_of_sum;
                         }else {

                             couter = "" + Math.round(calculate_value_of_sum);
                         }
                         string_temporiry = "";
                         break;
                 }
                 jTextField.setText(couter);
                 operatore_chack = false ;
                 int_float_value = false ;
             }
         }else if(index == 21 || index == 20){
             couter = "";
             last_number = 000;
             int_float_value  = false ;
             operatore_chack = true ;
             calculate_value_of_sum = 0;
             string_temporiry = "";
             int_temporiry_operatore = 0;
             frist_value = true ;
             jTextField.setText("0");
         }else if(index == 101){
             couter = couter.substring(0, couter.length() - 1);
             string_temporiry = string_temporiry.substring(0, string_temporiry.length() - 1);
             jTextField.setText(couter);
         }
     }
}

class  j_frame extends all_operation_perfome {
    public j_frame() {
        all_operation_perfome all_operation_perfome = new all_operation_perfome();


        base_class jFrame_object = new base_class();
        JFrame jFrame = jFrame_object.base_class_jframe();
        component class_component = new component();

        JButton button_mc = class_component.button_mc_func();
        button_mc.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
//                all_operation_perfome.calculate_the_number_of();
            }
        });

        JButton button_mr = class_component.button_mr_func();
        button_mr.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {

            }
        });

        JButton button_m_subtract = class_component.button_msubtract_func();
        button_m_subtract.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {

            }
        });

        JButton button_m_addition = class_component.button_maddition_func();
        button_m_addition.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {

            }
        });

        JButton button_ms = class_component.button_ms_func();
        button_ms.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {

            }
        });

        JButton button_dropdown = class_component.button_dropdown_func();
        button_dropdown.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {

            }
        });

        JButton button_modulo = class_component.button_modulo_func();
        button_modulo.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(13);
            }
        });

        JButton button_one_upone = class_component.button_one_upone_func();
        button_one_upone.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(22);
            }
        });

        JButton button_seven = class_component.button_seven_func();
        button_seven.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(7);
            }
        });

        JButton button_fourth = class_component.button_fourth_func();
        button_fourth.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(4);
            }
        });

        JButton button_one = class_component.button_one_func();
        button_one.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(1);
            }
        });

        JButton button_subtract_addition = class_component.button_subtract_addition_func();
        button_subtract_addition.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {

            }
        });

        JButton button_ce = class_component.button_ce_func();
        button_ce.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(21);
            }
        });

        JButton button_x_squre = class_component.button_x_squre_func();
        button_x_squre.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(11);
            }
        });

        JButton button_8 = class_component.button_8_func();
        button_8.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(8);
            }
        });

        JButton button_5 = class_component.button_5_func();
        button_5.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(5);
            }
        });

        JButton button_2 = class_component.button_2_func();
        button_2.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(2);
            }
        });

        JButton button_0 = class_component.button_0_func();
        button_0.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(0);
            }
        });

        JButton button_c = class_component.button_c_func();
        button_c.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(20);
            }
        });

        JButton button_x_root = class_component.button_x_root_func();
        button_x_root.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(19);
            }
        });

        JButton button_9 = class_component.button_9_func();
        button_9.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(9);
            }
        });

        JButton button_6 = class_component.button_6_func();
        button_6.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(6);
            }
        });

        JButton button_3 = class_component.button_3_func();
        button_3.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(3);
            }
        });

        JButton button_doubte = class_component.button_doubte_func();
        button_doubte.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(18);
            }
        });


//        ------------------------------------------------------------
        JButton button_backspace = class_component.button_backspace_func();
        button_backspace.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(101);
            }
        });

        JButton button_multiplication = class_component.button_multiplication_func();
        button_multiplication.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(12);
            }
        });

        JButton button_division = class_component.button_division_func();
        button_division.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(10);
            }
        });

        JButton button_subtractio = class_component.button_subtractio_func();
        button_subtractio.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(14);
            }
        });

        JButton button_addition = class_component.button_addition_func();
        button_addition.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(16);
            }
        });

        JButton button_anserw = class_component.button_anserw_func();
        button_anserw.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                all_operation_perfome.calculate_the_number_of(17);
            }
        });


//        ---------------------------------------------------------------------

        JTextField output_box = all_operation_perfome.output_box();
        JLabel date_time_lable = class_component.date_time_leble();


        jFrame.add(button_mc);
        jFrame.add(button_mr);
        jFrame.add(button_m_subtract);
        jFrame.add(button_m_addition);
        jFrame.add(button_ms);
        jFrame.add(button_dropdown);
        jFrame.add(button_modulo);
        jFrame.add(button_one_upone);
        jFrame.add(button_seven);
        jFrame.add(button_fourth);
        jFrame.add(button_one);
        jFrame.add(button_subtract_addition);
        jFrame.add(button_ce);
        jFrame.add(button_x_squre);
        jFrame.add(button_8);
        jFrame.add(button_5);
        jFrame.add(button_2);
        jFrame.add(button_0);
        jFrame.add(button_c);
        jFrame.add(button_x_root);
        jFrame.add(button_9);
        jFrame.add(button_6);
        jFrame.add(button_3);
        jFrame.add(button_doubte);

//        --------------------------------------------------------------

        jFrame.add(button_backspace);
        jFrame.add(button_multiplication);
        jFrame.add(button_division);
        jFrame.add(button_subtractio);
        jFrame.add(button_addition);
        jFrame.add(button_anserw);
        jFrame.add(output_box);
        jFrame.add(date_time_lable);
        jFrame.setDefaultCloseOperation(jFrame.EXIT_ON_CLOSE);
    }

}

class index extends j_frame {
    public static void main(String[] args){
        System.out.println("Hello dhiraj");
        new j_frame();
    }
}