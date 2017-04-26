<?php

/**
 * @Block(
 * id= "count_node",
 * admin_label = @Translation("Count Node Item")
 * ) 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Drupal\ashishthakurassignment\Plugin\Block;
use Drupal\Core\Block\BlockBase;

class CountNode extends BlockBase{
         /**
   * {@inheritdoc}
   */
    public function build() {
       $contentTypes=\Drupal::service('entity.manager')->getStorage('node_type')->loadMultiple();
       $contentTypesList= [];
            foreach ($contentTypes as $contentType) {
                 $contentTypesList[$contentType->id()] = $contentType->id();
            }

        $con= \Drupal::entityQuery('node');
        $result=$con->condition('status', 1)
                    ->execute();
        
        $content=\Drupal::entityTypeManager()->getStorage('node');
        $items;
        
        foreach ($result as $row){
            $items[$row]=$content->load($row)->getType();
            
        }
//       
//        
//        kint($contentTypesList);
//        die;
        $arrayCheck;
         $str1="<table><tr><th>Content Type</th><th>Count</th></tr>";
        
        foreach($contentTypesList as $contentinfo){
         $count=0;
         $arrayCheck[$contentinfo]=[
           
            'contenttype' => $contentinfo
        ];
        foreach($items as $rows){
            if($contentinfo==$rows){
            $count+=1;
         
                 }
                 
                  
        }
        if($count!=0){
            $arrayCheck[$contentinfo]['count']=$count;
         $str1.="<tr><td>".$arrayCheck[$contentinfo]['contenttype']."</td><td>".$arrayCheck[$contentinfo]['count']."</td>";
        
        }
      
        
        
        }
         $str1.="</table>";
        //Entity Query Aggregate
        $query=\Drupal::entityQueryAggregate('node');
        $var=$query->groupBy('type')->aggregate('nid', 'count')->execute();
        $str="<table><tr><th>Content Type</th><th>Count</th></tr>";
            foreach($var as $roes){
                $str.="<tr><td>".$roes['type']."</td><td>".$roes['nid_count']."</td>";
            }
        $str.="</table>";
        
        
        return [
            '#markup' => $this->t($str1),
        ];
    }
   
   
}
