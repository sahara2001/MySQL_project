//check the item exist before placeing the order
delimiter $
CREATE TRIGGER before_check_items before insert on order_info
for each row
begin
if(NOT(New.Product_type_id IN (SELECT Product_type_id from product_type)) OR New.Quantity >(SELECT Inventory_quantity from product_type where Product_type_id = New.Product_type_id) ) then 

end if;
end $;
delimiter;

//For updating the quantity of inventory after an arrival of shipment 
DELIMITER $$
CREATE TRIGGER after_insert_shipment_incre after insert on shipment
for each row
begin
    IF NEW.Product_type_id IN (SELECT Product_type_id from product_type) THEN 
        UPDATE product_type as p SET p.Inventory_quantity = p.Inventory_quantity  + NEW.Quantity WHERE p.Product_type_id = NEW.Product_type_id;
    ELSE 
        INSERT INTO product_type(Product_type_id,Inventory_quantity,Base_price,Current_price) VALUES (NEW.Product_type_id, New.Quantity,New.Cost,New.Cost*1.25)	;
    end if;
END;$$
DELIMITER ;


drop trigger if exists after_update_pt
DELIMITER $$
CREATE TRIGGER after_update_pt before update on product_type
for each row
begin

if(NEW.Base_price <> OLD.Base_price) then 
    if(New.Inventory_quantity <= 10) then 
		set New.Current_price = New.Base_price*(1+0.01*(11 - New.Inventory_quantity)) ;
    end if;
end if;

if(Old.Inventory_quantity <> New.Inventory_quantity) then
    if(New.Inventory_quantity <= 10) then 
        set New.Current_price = New.Base_price*(1+0.01*(11 - New.Inventory_quantity)) ;
    end if;
    if(New.Inventory_quantity > 10 AND Old.Inventory_quantity <= 10) then
         set New.Current_price = New.Base_price*(1.25) ;
    end if;
end if;

END;$$
DELIMITER ;
//create update trigger for case 1: base price , case2 current price, case3 inventory quant


DROP TRIGGER IF EXISTS after_insert_pt
DELIMITER $$
CREATE TRIGGER after_insert_pt before insert on product_type
for each row
begin
if(NEW.Inventory_quantity <= 10) then 
	 SET New.Current_price = New.Base_price*(1+0.01*(11 - NEW.Inventory_quantity));
end if;
END;$$
DELIMITER ;

//
drop trigger if exists after_insert_oi
DELIMITER $$
CREATE TRIGGER after_insert_oi after insert on order_info
for each row
begin

if(NEW.Buyer_id NOT IN (SELECT Buyer_id from customer)) then 
	insert into customer(Buyer_id) values (new.Buyer_id);
end if;
END;$$
DELIMITER ;
