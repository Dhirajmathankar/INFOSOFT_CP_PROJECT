<?php
class Validation
{
    var $error = array();
    //field name, type, req, min, max, error msg//
    function addRule($field, $type, $label, $req=false, $min=false, $max=false,$size=false)
    {
        if($req==true and trim($field) =='')
        {
            $this->error[] = $label.' is required.';
            return false;
        }		
        if($min)
        {
            if(strlen($field)<$min)
            {
                $this->error[] = "Minimum $min characters required in $label";
                return false;
            }
        }
        if($max)
        {
            if(strlen($field)>$max)
            {
                $this->error[] = "Maximum $max characters allowed in $label";
                return false;
            }
        }
        if($type=='alphanum')
        {
            $result = ereg ("^[A-Za-z0-9\ ]+$", $field);
            if (!$result)
            {
                $this->error[] = "Please enter valid characters in $label";
                return false;
            }		
        }
        elseif($type=='alpha')
        {
            $result = ereg ("^[A-Za-z\'\ ]+$", $field);
            if (!$result)
            {
                $this->error[] = "Please enter alphabets only in $label";
                return false;
            }		
        }
        elseif($type=='code')
        {
            $result = ereg ("^[A-Z_]+$", $field);
            if (!$result)
            {
                $this->error[] = "Please enter Valid $label";
                return false;
            }		
        }
        elseif($type=='drop')
        {			
            if($field=="0")
            {
                $this->error[] = "Please Select $label.";
                return false;
            }
            elseif($field=="")
            {
                $this->error[] = "Please Select $label.";
                return false;
            }
        }
        elseif($type=='alphanospace')
        {
            $result = ereg ("^[A-Za-z\]+$", $field);
            if (!$result)
            {
                $this->error[] = "Please enter only alphabets in $label";
                return false;
            }		
        }
        elseif($type=='smallalphanospace')
        {
            $result = ereg ("^[a-z\]+$", $field);
            if (!$result)
            {
                $this->error[] = "Please enter small letters without space in $label";
                return false;
            }		
        }
        elseif($type=='num')
        {
            $result = ereg ("^[0-9\ ]+$", $field);
            if (!$result)
            {
                $this->error[] = "Please enter numbers only in $label";
                return false;
            }		
        }

        elseif($type=='dec')
        {
            $result = ereg ("^[0-9\.]+$", $field);
            if (!$result)
            {
                $this->error[] = "Please enter numbers only in $label";
                return false;
            }		
        }
        elseif($type=='price')
        {
            if($field == 0)
            {
                $this->error[] = "Please enter valid price";
                return false;
            }
            else
            {
                $result = ereg ("^[0-9\.]+$", $field);
                if (!$result)
                {
                    $this->error[] = "Please enter numbers only in $label";
                    return false;
                }		
            }
        }
        elseif($type=='email')
        {
            $result = ereg ("^[^@ ]+@[^@ ]+\.[^@ \.]+$", $field);
            if (!$result)
            {
                $this->error[] = "Please enter valid email address in $label";
                return false;
            }
        }
        elseif($type=='email2')
        {
            $result = ereg ("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $field);
            if (!$result)
            {
                $this->error[] = "Please enter valid email address";
                return false;
            }
        }

        elseif($type=='url')
        {
            $result = preg_match('/((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)/i', $field);
            if (!$result)
            {
                $this->error[] = "Please enter valid url in $label";
                return false;
            }
        }
        elseif($type=='contact')
        { 
            if(!preg_match(REGX_PHONE, $field) &&  $field!='' )
            {
                $this->error[] = "Please enter valid $label.";
                return false;
            }
         }
        elseif($type=='image')
        {
            $ext = end(explode('.', strtolower($field)));
            if($ext != '' && !in_array($ext,array('jpeg','jpg','png','gif')))
            {
                $this->error[] = "Only JPG, GIF & PNG images are allowed as $label.";
                return false;
            }
        }
        elseif($type=='imagesize')
        {
            if($field > $size)
            {
                    $kbsize = $size/1024;
                    $this->error[] = "$label size should be less than or $kbsize KB in Size";
                    return false;
            }
        }
    }
    function oldPassword($field1,$field2)
    {
        if($field1!=$field2)	
        {
            $this->error[] = "Current Password is incorrect";
            return false;
        }
    }
    function confirmPassword($field1,$field2)
    {
        if($field1!=$field2)	
        {
            $this->error[] = "Password does not match";
            return false;
        }
    }
    function confirmValue($field1,$field2,$label)
    {
        if($field1!=$field2)	
        {
            $this->error[] = "$label doesn't match";
            return false;
        }
    }
    function matchValue($field1,$field2,$label)
    {
        if($field1==$field2)	
        {
            $this->error[] = "$label must be different";
            return false;
        }
    }
    function validate()
    {
        if(!count($this->error))
        {
            return true;		
        }
        else
        {
            return false;
        }
    }
    function errors()
    {
        return $this->error[0];		
    }
}
?>